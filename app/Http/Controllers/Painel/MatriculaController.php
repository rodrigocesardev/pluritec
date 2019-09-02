<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Painel\Aluno;
use App\Models\Painel\Curso;
use App\Models\Painel\Matricula;

use App\Http\Requests\Painel\MatriculaFormRequest;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    private $aluno;
    private $curso;
    private $matricula;
    private $totalPag = 9;

    public function __construct(Matricula $matricula, Aluno $aluno, Curso $curso) {
        $this->matricula = $matricula;
        $this->curso = $curso;
        $this->aluno = $aluno;
    }

    public function index() {
        $title = 'Listagem das Matrículas';
        $matriculas = $this->matricula
                        ->leftJoin('cursos', 'matriculas.id_curso', '=', 'cursos.id')
                        ->leftJoin('alunos', 'matriculas.id_aluno', '=', 'alunos.id')
                        ->select('matriculas.id', 'matriculas.id_curso', 'matriculas.id_aluno', 'cursos.titulo', 'alunos.nome')
                        ->paginate($this->totalPag);
        
        //dd($matriculas);
        
        return view('painel.matriculas.index', compact('matriculas', 'title'));
    }

    public function create() {
        $title = 'Cadastar Matrícula';
        $cursos = $this->curso->all();
        $alunos = $this->aluno->all();
        return view('painel.matriculas.create-edit', compact('title', 'cursos', 'alunos'));
    }

    public function edit($id) {
        $matricula = $this->matricula->find($id);
        $cursos = $this->curso->all();
        $alunos = $this->aluno->all();
        $title = "Editar Matrícula";
        return view('painel.matriculas.create-edit', compact('title', 'matricula', 'cursos', 'alunos'));
    }

    public function update(MatriculaFormRequest $request, $id) {
        $dataForm = $request->all();
        $auxMatricula = $this->matricula->find($id);
        $update = $auxMatricula->update($dataForm);

        if ($update) {
            return redirect()->route('matriculas.index');
        } else {
            return redirect()->route('matriculas.edit', $id)->with(['errors' => 'Falha ao editar a matrícula!']);
        }
    }

    public function show($id) {
        $matricula = $this->matricula->find($id);
        $curso = $this->curso->where('id', $matricula->id_curso)->get();
        //$curso = $auxCurso[0]->titulo;
        $aluno = $this->aluno->where('id', $matricula->id_aluno)->get();
        //$aluno = $auxAluno[0]->nome; 
        
        //dd($curso);
        //dd($aluno);
        
        $title = "Visualizar matrícula";
        return view('painel.matriculas.show', compact('matricula', 'title', 'curso', 'aluno'));
    }

    public function destroy($id) {
        $matricula = $this->matricula->find($id);
        $delete = $matricula->delete();

        if ($delete) {
            return redirect()->route('matriculas.index');
        } else {
            return redirect()->route('matriculas.show', $id)->with(['errors' => 'Ocorreu um erro ao deletar a matrícula!']);
        }
    }

    public function store(MatriculaFormRequest $request) {
        $dataForm = $request->all();
        //dd($dataForm);
        
        $insert = $this->matricula->create($dataForm);
        if ($insert) {
            return redirect()->route('matriculas.index');
        } else {
            return 'Falha ao inserir uma nova matrícula!';
        }
    }
}
