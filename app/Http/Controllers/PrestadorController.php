<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Services\PrestadorService;
use Illuminate\Support\Facades\Session;
use TecnoSpeed\Plugnotas\Error\RequiredError;
use TecnoSpeed\Plugnotas\Error\ValidationError;

class PrestadorController extends Controller
{
    public function lista()
    {
        return view('prestador.lista');
    }

    public function cadastrar($cpfCnpj = null, $index = null)
    {
        $prestador = null;
        if($cpfCnpj) {
            $prestador = PrestadorService::getPrestador($cpfCnpj);
            if(isset($prestador->statusCode) && $prestador->statusCode != 200 && $prestador->statusCode != 201) {
                return redirect()->back()->with('error', $prestador->body->error->message);
            }
            $prestador = data_get((array) $prestador, 'body');
        }
        
        $tiposLogradouro = Endereco::getTiposLogradouro();
        $tiposBairro = Endereco::getTiposBairro();
        $estados = Endereco::getEstados();

        return view('prestador.cadastrar', compact('tiposLogradouro', 'tiposBairro', 'estados', 'prestador', 'index'));
    }

    public function salvar(Request $request, $cpfCnpj = null, $index = null)
    {
        $dados = $request->all();
        unset($dados['_token']);

        if(!$cpfCnpj) {
            $dadosCadastro = PrestadorService::cadastrar($dados);
        } else {
            $dadosCadastro = PrestadorService::editar($dados, $cpfCnpj);
        }

        if($dadosCadastro instanceof ValidationError || $dadosCadastro instanceof RequiredError) {
            return redirect()->back()->with('error', $dadosCadastro->getMessage());
        };
        if(isset($dadosCadastro->statusCode) && $dadosCadastro->statusCode != 200 && $dadosCadastro->statusCode != 201) {
            return redirect()->back()->with('error', $dadosCadastro->body->error->message);
        };

        Session::flash('success', $dadosCadastro->body->message);
        return view('prestador.lista', compact('dados', 'index'));
    }

}
