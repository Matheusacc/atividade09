<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Curso;


class DisciplinaController extends Controller
{
    public function listar() {
        $disciplinas = Disciplina::with('curso')->get();
        return view('disciplinas.listar', compact('disciplinas'));
    }

    public function criar() {
        $cursos = Curso::get();
        return view('disciplinas.criar', compact('cursos'));
    }

    public function criarDisciplina(Request $request) {
        $disciplina = new Disciplina();
        $disciplina->nome = $request->get('nome');
        $disciplina->curso_id = $request->get('curso');
        $disciplina->carga = $request->get('carga');
        $disciplina->save();
        return redirect()->route('disciplinas.listar');
    }

    public function deletar($id) {
        $disciplina = Disciplina::where('id', $id)->first();
        $disciplina->delete();
        return redirect()->route('disciplinas.listar');
    }

    public function editar($id) {
        $disciplina = Disciplina::where('id', $id)->first();
        $cursos = Curso::get();
        return view('disciplinas.editar', compact('disciplina', 'cursos'));
    }

    public function editarDisciplina(Request $request) {
        $disciplina = Disciplina::where('id', $request->get('id'))->first();
        $disciplina->nome = $request->get('nome');
        $disciplina->curso_id = $request->get('curso');
        $disciplina->carga = $request->get('carga');
        $disciplina->save();
        return redirect()->route('disciplinas.listar');
    }
}
