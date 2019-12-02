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

        return view('products.formRegister', ["result"=>$result]);
        // if($result) {
        //     echo "deu certo";
        // } else {
        //     echo "não deu certo";
        // }

    }

    //muitos lugares colocam como padrão o nome index
    //não precisava de parâmetro
    public function viewForm(Request $request) {
        return view('products.formRegister'); 
        //o ponto indica que está dentro de uma pasta - pq usa o método blade
    }

    //id 0 por padrão para não dar mensagem de erro no link de atualizar
    public function viewFormUpdate (Request $request, $id=0) {
        $product = Product::find($id);
        if($product) {
            //é como se fosse um request (criar array associativa para depois poder utilizar o $product)
            return view('products.formUpdate', ['product'=>$product]);
        } else {
            return view('products.formUpdate');
        }
    }
    
    public function update (Request $request) {
        //para atualizar, devemos buscar um objeto em vez de criar um objeto novo
        //necessário usar rotas com parâmetro
        //usar Product::find($idProduto)

        $product = Product::find($request->idProduct);
        $product->name = $request->nameProduct;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        //$product->user_id = Auth::user()->id;   ---- essa linha foi apagada para não substituir o usuário, caso o produto esteja sendo atualizado por outro usuário

        $result = $product->save();
        return view('products.formUpdate', ["result"=>$result]);
    }

    public function delete (Request $request, $id=0) {
        //para deletar usa Product::destroy($id);
        $result = Product::destroy($id);
        if($result) {
            return redirect('/produtos');
            //mesma coisa que o header Location
        }
    }

    public function viewAllProducts(Request $request) {
        //vai precisar do Product::All()
        $listProducts = Product::all();
        return view('products.products', ["listProducts"=>$listProducts]);
    }

    public function viewOneProduct(Request $request) {
        //precisar do Product::find($idProduto)
    }


}