<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;



class ProductController extends Controller {
    
    //fazendo funções separadas de cadastrar/exibir formulário
    public function create (Request $request) {
        // if($request->isMethod('GET')) {
        //     return view('formulario');
        // } else {
        //     //faço cadastro do produto
        // }

        //dd($request->nameProduct); TESTE

        $newProduct = new Product;
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->description;
        $newProduct->quantity = $request->quantity;
        $newProduct->price = $request->price;
        $newProduct->user_id = Auth::user()->id;
        //Auth() -- para não dar o erro
        // Auth é uma classe global  -- o laravel gera objeto nessa classe quando você loga. Em user ele já grava as informações do usuário

        $result = $newProduct->save();

        return view('products.form', ["result"=>$result]);
        // if($result) {
        //     echo "deu certo";
        // } else {
        //     echo "não deu certo";
        // }

    }

    //muitos lugares colocam como padrão o nome index
    //não precisava de parâmetro
    public function viewForm(Request $request) {
        return view('products.form'); 
        //o ponto indica que está dentro de uma pasta - pq usa o método blade
    }
    
    public function update (Request $request) {
        //para atualizar, devemos buscar um objeto em vez de criar um objeto novo
        //$newProduct = Product::find(aqui coloca a id do produto - tem que ser um parâmetro);
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->description;
        $newProduct->quantity = $request->quantity;
        $newProduct->price = $request->price;
        $newProduct->user_id = Auth::user()->id;

        //necessário usar rotas com parâmetro
        //usar Product::fin($idProduto)
    }

    public function delete (Request $request) {
        //para deletar usa Product::destroy($id);
    }

    public function viewAllProducts(Request $request) {
        //vai precisar do Product::All()
    }

    public function viewOneProduct(Request $request) {
        //precisar do Product::find($idProduto)
    }


}