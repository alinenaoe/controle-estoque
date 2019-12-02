@extends('layouts.app')

@section('content') 

    <section class="container">

        <div class="row">
            <div class="col-md-12">
            <h1>Lista de produtos</h1>
            </div>

            <div class="col-md-12 mt-5">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome do produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Última atualização</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($listProducts as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>R$ {{$product->price}}</td>
                                <td>id do usuário</td>
                                <td>{{$product->created_at}}</td>
                                <td>{{$product->updated_at}}</td>
                                <td>
                                    <a class="btn btn-primary" href="/produtos/atualizar/{{$product->id}}">Atualizar</a>
                                    <a class="btn btn-danger"  href="/produtos/deletar/{{$product->id}}">Deletar</a>
                                </td>
                            </th>
                        </tr>
                    @endforeach    
                    </tbody>

                </table>
            </div>
        </div>

    </section>

@endsection
