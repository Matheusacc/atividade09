<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\VinculoAlunoDisciplina;


class AlunoController extends Controller
{
    public function listar() {
        $alunos = Aluno::get();
        return view('alunos.listar', compact('alunos'));
    }

    public function criar() {
        $cursos = Curso::get();
        return view('alunos.criar', compact('cursos'));
    }

    public function criarAluno(Request $request) {
        $aluno = new Aluno();
        $aluno->nome = $request->get('nome');
        $aluno->curso_id = $request->get('curso');
        $aluno->save();
        return redirect()->route('alunos.listar');
    }

    public function deletar($id) {
        $aluno = Aluno::where('id', $id)->first();
        $aluno->delete();
        return redirect()->route('alunos.listar');
    }

    public function editar($id) {
        $aluno = Aluno::where('id', $id)->first();
        $cursos = Curso::get();
        return view('alunos.editar', compact('aluno', 'cursos'));
    }

    public function editarAluno(Request $request) {
        $aluno = Aluno::where('id', $request->get('id'))->first();
        $aluno->nome = $request->get('nome');
        $aluno->curso_id = $request->get('curso');
        $aluno->save();

        return redirect()->route('alunos.listar');
    }

    public function vincular($id) {
        $aluno = Aluno::where('id', $id)->first();
        $disciplinas = Disciplina::where('curso_id', $aluno->curso_id)->get();
        return view('alunos.vincular', compact('aluno', 'disciplinas'));
    }

    public function vincularDisciplinas(Request $request) {
        $aluno = Aluno::where('id', $request->get('id'))->first();
        $disciplinas = Disciplina::where('curso_id', $aluno->curso_id)->get();
        foreach($disciplinas as $disciplina) {
            if($request->get('disciplinas_'.$disciplina->id) != null
                && $request->get('disciplinas_'.$disciplina->id) == $disciplina->id) {
                    $vinculo = new VinculoAlunoDisciplina();
                    $vinculo->aluno_id = $aluno->id;
                    $vinculo->disciplina_id = $disciplina->id;
                    $vinculo->save();
            }
        }
        return redirect()->route('alunos.listar');
    }

}
