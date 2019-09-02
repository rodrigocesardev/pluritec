<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Aluno;
use App\Http\Requests\Painel\AlunoFormRequest;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller {

    private $aluno;
    private $totalPag = 5;

    public function __construct(Aluno $aluno) {
        $this->aluno = $aluno;
    }

    public function index() {
        $title = 'Listagem dos Alunos';
        $alunos = $this->aluno->paginate($this->totalPag);
        return view('painel.alunos.index', compact('alunos', 'title'));
    }
    
    public function consulta(AlunoFormRequest $request) {
        $title = 'Listagem dos Alunos';
        $alunos = $this->aluno
                    ->where($request)
                    ->paginate($this->totalPag);
        dd($alunos);
        return view('painel.alunos.index', compact('alunos', 'title'));
    }

    public function create() {
        $title = 'Cadastar Aluno';
        return view('painel.alunos.create-edit', compact('title'));
    }

    public function edit($id) {
        $aluno = $this->aluno->find($id);
        $title = "Editar Aluno";
        return view('painel.alunos.create-edit', compact('title', 'aluno'));
    }

    public function update(AlunoFormRequest $request, $id) {
        $dataForm = $request->all();
        $auxAluno = $this->aluno->find($id);
        $update = $auxAluno->update($dataForm);

        if ($update) {
            return redirect()->route('alunos.index');
        } else {
            return redirect()->route('alunos.edit', $id)->with(['errors' => 'Falha ao editar aluno!']);
        }
    }

    public function show($id) {
        $aluno = $this->aluno->find($id);
        $title = "Visualizar aluno";
        return view('painel.alunos.show', compact('aluno', 'title'));
    }

    public function destroy($id) {
        $aluno = $this->aluno->find($id);
        $delete = $aluno->delete();

        if ($delete) {
            return redirect()->route('alunos.index');
        } else {
            return redirect()->route('alunos.show', $id)->with(['errors' => 'Ocorreu um erro ao deletar o aluno!']);
        }
    }

    public function store(AlunoFormRequest $request) {
        $dataForm = $request->all();
        //dd($dataForm);
        
        $insert = $this->aluno->create($dataForm);
        if ($insert) {
            return redirect()->route('alunos.index');
        } else {
            return 'Falha ao inserir novo aluno!';
        }
    }
}