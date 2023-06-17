<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contato;

class PrincipalController extends Controller
{
    public function contato(Request $request)
    {
        $contatos = Contato::all();
        return view('welcome')->with('contatos', $contatos);
    }
    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'min:3|max:40',
            'sobrenome' => 'min:3|max:40',
            'telefone' => 'min:8|max:15|unique:App\Models\Contato,telefone'
        ]);
        Contato::create($request->all());
        return redirect()->route('index')->with('msg', 'cadastrado com sucesso');
    }
    public function excluir($id, Request $request)
    {
        $contato = Contato::find($id);
        if ($contato) {
            $contato->delete();
        } else {
        }
        return redirect()->route('index')->with('msg', 'deletado com sucesso');
    }

    public function editar($id, Request $request)
    {
        $contato = Contato::find($id);
        $request->validate([
            'nome' => 'min:3|max:40',
            'sobrenome' => 'min:3|max:40',
            'telefone' => 'min:8|max:15'
        ]);
        $contato->fill($request->all());
        $contato->save();
        return redirect()->route('index')->with('msg', 'editado com sucesso');
    }
}
