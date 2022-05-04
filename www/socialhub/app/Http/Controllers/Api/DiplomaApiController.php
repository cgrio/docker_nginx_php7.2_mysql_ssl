<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class DiplomaApiController extends Controller
{
    public function exibirInfoXmlDiploma(Request $request)
    {
        $arquivo = "12343920220504627272df44abb.xml";
        $caminho_diplomas = storage_path('app') . '/public/diplomas';
        $caminho_diplomas_arquivo = $caminho_diplomas . "/" . $arquivo;
        if (\file_exists($caminho_diplomas_arquivo)) {
            $xml = simplexml_load_file($caminho_diplomas_arquivo);
          //  echo(dd($xml));
            $json = json_encode($xml);
            $arr = json_decode($json, true);
            return $arr;
        }
    }
}
