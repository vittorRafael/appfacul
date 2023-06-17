<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Trazendo o model Contato para poder se comunicar com a tabela no banco de dados.
use \App\Models\Contato;

//O Controller é a classe que executa ações no padrão MVC, ligando o model (representação da tabela no banco) a View (resultado que aparece para o usuário)
class PrincipalController extends Controller
{
    //função contato, função que é executada na rota / que é o início do app.
    public function contato()
    {
        //Utiliza o model Contato para conversar com o banco e retornar todos os registros na tabela, salvando na variável $contatos.
        $contatos = Contato::all();

        //Retorna a view welcome passando como parametro para a view a váriavel $contatos contendo todos os registros.
        return view('welcome')->with('contatos', $contatos);
    }
    //função salvar passando como parâmetro o Request da pagina, executada na rota / através do método post.
    public function salvar(Request $request)
    {
        //validação dos campos do formulário através dos atributos name dos inputs na view.
        $request->validate([
            //input nome: minimo de 3 caracteres, máximo de 30
            'nome' => 'min:3|max:30',
            //input sobrenome: minimo de 3 caracteres, máximo de 30
            'sobrenome' => 'min:3|max:30',
            //input telefone: minimo de 8 caracteres, máximo de 15 e pode ter apenas 1 registro no banco com esse telefone.
            'telefone' => 'min:8|max:15|unique:App\Models\Contato,telefone'
        ]);
        //Sendo validado, utiliza-se o model contato para se conectar a tabela do banco e cadastrar novo registro.
        Contato::create($request->all());
        //Redireciona a rota com nome index passando a mensagem.
        return redirect()->route('index')->with('msg', 'cadastrado com sucesso');
    }

    //função excluir pegando o parametro id passado atraves da rota /{id}/excluir
    public function excluir($id)
    {
        //Utiliza-se o model Contato para se conectar a tabela e buscar o registro com o mesmo id que foi passado como parâmetro, após encontrado salva o registro na variavel $contato.
        $contato = Contato::find($id);

        //teste para saber se existe algum contato com o id passado, se sim, usa a função delete para excluí-lo do banco, se
        if ($contato) {
            $contato->delete();
        }

        //redireciona para rota com nome index passando a mensagem
        return redirect()->route('index')->with('msg', 'deletado com sucesso');
    }

    //função editar pegando o id passado na rota /{id}/editar
    public function editar($id, Request $request)
    {
        //Utiliza-se o model Contato para se conectar a tabela e buscar o registro com o mesmo id que foi passado como parâmetro, após encontrado salva o registro na variavel $contato.
        $contato = Contato::find($id);

        //validação dos campos do formulário através dos atributos name dos inputs na view.
        $request->validate([
            'nome' => 'min:3|max:40',
            'sobrenome' => 'min:3|max:40',
            'telefone' => 'min:8|max:15'
        ]);

        //cria um array com todos os valores dos inputs
        $contato->fill($request->all());
        //salva o contato na tabela com as novas informações
        $contato->save();
        //redireciona para rota com nome index passando a mensagem
        return redirect()->route('index')->with('msg', 'editado com sucesso');
    }
}
