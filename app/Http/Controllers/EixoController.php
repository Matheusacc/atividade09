<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;

class EixoController extends Controller
{
    public function listar() {
        $eixos = Eixo::get();
        return view('eixos.listar', compact('eixos'));
    }

    public function criar() {
        return view('eixos.criar');
    }

    public function criarEixo(Request $request) {
        $eixo = new Eixo();
        $eixo->nome = $request->get('nome');
        $eixo->save();

        return redirect()->route('eixos.listar');
    }

    public function deletar($id) {
        $eixo = Eixo::where('id', $id)->first();
        $eixo->delete();
        return redirect()->route('eixos.listar');
    }

    public function editar($id) {
        $eixo = Eixo::where('id', $id)->first();
        return view('eixos.editar', compact('eixo'));
    }

    public function editarEixo(Request $request) {
        $eixo = Eixo::where('id', $request->get('id'))->first();
        $eixo->nome = $request->get('nome');
        $eixo->save();

        return redirect()->route('eixos.listar');
    }
}
