<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Eixo;

class CursoController extends Controller
{
    public function listar() {
        $cursos = Curso::get();
        return view('cursos.listar', compact('cursos'));
    }

    public function criar() {
        $eixos = Eixo::get();
        return view('cursos.criar', compact('eixos'));
    }

    public function criarCurso(Request $request) {
        $curso = new Curso();
        $curso->nome = $request->get('nome');
        $curso->sigla = $request->get('sigla');
        $curso->tempo = $request->get('tempo');
        $curso->eixo_id = $request->get('eixo');
        $curso->save();

        return redirect()->route('cursos.listar');
    }

    public function deletar($id) {
        $curso = Curso::where('id', $id)->first();
        $curso->delete();
        return redirect()->route('cursos.listar');
    }

    public function editar($id) {
        $curso = Curso::where('id', $id)->first();
        $eixos = Eixo::get();
        return view('cursos.editar', compact('curso', 'eixos'));
    }

    public function editarCurso(Request $request) {
        $curso = Curso::where('id', $request->get('id'))->first();
        $curso->nome = $request->get('nome');
        $curso->sigla = $request->get('sigla');
        $curso->tempo = $request->get('tempo');
        $curso->eixo_id = $request->get('eixo');
        $curso->save();

        return redirect()->route('cursos.listar');
    }
}
