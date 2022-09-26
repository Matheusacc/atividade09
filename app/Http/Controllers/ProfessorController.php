<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Eixo;
use App\Models\Disciplina;
use App\Models\VinculoProfessorDisciplina;

class ProfessorController extends Controller
{
    public function listar() {
        $professores = Professor::with('eixo')->get();
        return view('professores.listar', compact('professores'));
    }

    public function criar() {
        $eixos = Eixo::get();
        return view('professores.criar', compact('eixos'));
    }

    public function criarProfessor(Request $request) {
        $professor = new Professor();
        $professor->nome = $request->get('nome');
        $professor->email = $request->get('email');
        $professor->siape = $request->get('siape');
        $professor->eixo_id = $request->get('eixo');
        $professor->ativo = $request->get('ativo');
        $professor->save();

        return redirect()->route('professores.listar');
    }

    public function deletar($id) {
        $professor = Professor::where('id', $id)->first();
        $professor->delete();
        return redirect()->route('professores.listar');
    }

    public function editar($id) {
        $professor = Professor::where('id', $id)->first();
        $eixos = Eixo::get();
        return view('professores.editar', compact('professor', 'eixos'));
    }

    public function editarProfessor(Request $request) {
        $professor = Professor::where('id', $request->get('id'))->first();
        $professor->nome = $request->get('nome');
        $professor->email = $request->get('email');
        $professor->siape = $request->get('siape');
        $professor->eixo_id = $request->get('eixo');
        $professor->ativo = $request->get('ativo');
        $professor->save();

        return redirect()->route('professores.listar');
    }

    public function vincular() {
        $professores = Professor::get();
        $disciplinas = Disciplina::get();
        return view('professores.vincular', compact('professores', 'disciplinas'));
    }

    public function vincularDisciplinas(Request $request) {
        $disciplinas = Disciplina::get();
        foreach($disciplinas as $disciplina) {
            $professor = Professor::where('id', $request->get('professor_'.$disciplina->id))->first();
            $vinculo = new VinculoProfessorDisciplina();
            $vinculo->professor_id = $professor->id;
            $vinculo->disciplina_id = $disciplina->id;
            $vinculo->save();
        }
        return redirect()->route('alunos.listar');
    }
}
