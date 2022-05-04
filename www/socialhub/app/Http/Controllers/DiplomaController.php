<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index(Request $request)
    {
        return view("diploma.index");
    }

    public function assinarDiploma(Request $request)
    {
        return view("diploma.exibir");
    }

    public function salvarDiploma(Request $request)
    {
        // Define o valor default para a variável que contém o nome da imagem
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('xml_diploma') && $request->file('xml_diploma')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
            // Recupera a extensão do arquivo
            $extension = $request->xml_diploma->extension();
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            // Faz o upload:
            $upload = $request->xml_diploma->storeAs('diplomas', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/diplomas/nomedinamicoarquivo.extensao
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload) {
                return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
            }
            return  redirect()->route("diploma.exibir");
        }
    }

    public function exibirDiplomasEnviados(Request $request)
    {
        $arquivos_diploma = [];
        $diretorio_certificados = storage_path('app') . '/public/diplomas';
       // dd($diretorio_certificados);
        if (\is_dir($diretorio_certificados)) {
            $arquivos_diploma = array_diff(scandir($diretorio_certificados), array('.', '..'));
        }


        return view("diploma.exibir", ["arquivos_diploma" => $arquivos_diploma]);
    }

    public function enviarDiploma(Request $request)
    {
        return view("diploma.enviar");
    }

    public function validarDiploma(Request $request)
    {
        return view("diploma.enviar");
    }
}
