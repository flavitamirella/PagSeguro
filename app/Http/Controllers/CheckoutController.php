<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;

use App\Http\Requests;

class CheckoutController extends Controller
{
    public function getCheckout($valorTotal){

      return view('pagseguro.checkout')->with(['valorTotal' => $valorTotal]);

    }

    public function getProdutos(){

        $produtos = Produtos::all();

        return view('pagseguro.produtos')->with(['produtos' => $produtos]);
    }


    public function getListProdutos(){

        $produtos = Produtos::all();

        return response()->json($produtos);


    }

    public function postCadastrar(){


   }

}
