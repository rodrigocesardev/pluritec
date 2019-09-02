<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Curso;
use App\Http\Requests\Painel\CursoFormRequest;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    private $curso;
    private $totalPag = 7;

    public function __construct(Curso $curso) {
        $this->curso = $curso;
    }

    public function index() {
        $title = 'Listagem dos Cursos';
        $cursos = $this->curso->paginate($this->totalPag);
        return view('painel.cursos.index', compact('cursos', 'title'));
    }

    public function create() {
        $title = 'Cadastar Curso';
        return view('painel.cursos.create-edit', compact('title'));
    }

    public function edit($id) {
        $curso = $this->curso->find($id);
        $title = "Editar Curso";
        return view('painel.cursos.create-edit', compact('title', 'curso'));
    }

    public function update(CursoFormRequest $request, $id) {
        $dataForm = $request->all();
        $auxCurso = $this->curso->find($id);
        $update = $auxCurso->update($dataForm);

        if ($update) {
            return redirect()->route('cursos.index');
        } else {
            return redirect()->route('cursos.edit', $id)->with(['errors' => 'Falha ao editar curso!']);
        }
    }

    public function show($id) {
        $curso = $this->curso->find($id);
        $title = "Visualizar curso";
        return view('painel.cursos.show', compact('curso', 'title'));
    }

    public function destroy($id) {
        $curso = $this->curso->find($id);
        $delete = $curso->delete();

        if ($delete) {
            return redirect()->route('cursos.index');
        } else {
            return redirect()->route('cursos.show', $id)->with(['errors' => 'Ocorreu um erro ao deletar o curso!']);
        }
    }

    public function store(CursoFormRequest $request) {
        $dataForm = $request->all();
        //dd($dataForm);
        
        $insert = $this->curso->create($dataForm);
        if ($insert) {
            return redirect()->route('cursos.index');
        } else {
            return 'Falha ao inserir novo curso!';
        }
    }
}
