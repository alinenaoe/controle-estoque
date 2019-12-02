@extends('layouts.app')

<!-- section é uma função do blade. nomeamos de content por causa do yield dentro do padrão de layout -->
@section('content')

<section class="container w-50 card p-5">
    <div class="row">
        <div class="col-md-12">
        <h2 class="mb-5">Cadastrar novo produto</h2>
    


    <form action="/produtos/cadastrar" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nameProduct">Nome do produto</label>
            <input class="form-control" type="text" name="nameProduct" id="nameProduct">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>

        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input class="form-control" type="number" name="quantity" id="quantity">
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input class="form-control" type="number" step="0.01" name="price" id="price">
        </div>

        <div class="form-group">
            <label for="imgProduct">Imagem</label>
            <input class="form-control" type="file" name="imgProduct" id="imgProduct">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>        

    </form>

    </div>
    <div class="row">
        <div class="col-12">
            @if(isset($result))
                @if($result)
                    <h3>Produto cadastrado com sucesso!</h3>
                @else
                    <h3>Produto não cadastrado. Tente novamente</h3>
                @endif
            @endif
        </div>
    </div>
</section>


@endsection