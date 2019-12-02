@extends('layouts.app')

<!-- section é uma função do blade. nomeamos de content por causa do yield dentro do padrão de layout -->
@section('content')

<section class="container w-50 card p-5">
    <div class="row">
        <div class="col-md-12">
    
    @if(isset($product))
        <h2 class="mb-5">Atualizar informações do produto</h2>

        <form action="/produtos/atualizar" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="idProduct" value="{{$product->id}}" hidden>
            <div class="form-group">
                <label for="nameProduct">Nome do produto</label>
                <input class="form-control" type="text" name="nameProduct" id="nameProduct" value="{{$product->name}}">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" name="description" id="description">{{$product->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input class="form-control" type="number" name="quantity" id="quantity" value="{{$product->quantity}}">
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input class="form-control" type="number" step="0.01" name="price" id="price" value="{{$product->quantity}}"value="{{$product->price}}">
            </div>

            <div class="form-group">
                <label for="imgProduct">Imagem</label>
                <input class="form-control" type="file" name="imgProduct" id="imgProduct">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar informações</button>        

        </form>

    @elseif(isset($result)) 

    @else
        <h3>Produto não existe ou não foi selecionado</h3>
        <h4><a href="">Voltar para página de produtos</a></h4>
    @endif

    </div>
    <div class="row">
        <div class="col-12">
            @if(isset($result))
                @if($result)
                    <h3>Produto atualizado com sucesso!</h3>
                @else
                    <h3>Produto não atualizado. Tente novamente</h3>
                @endif
            @endif
        </div>
    </div>
</section>


@endsection