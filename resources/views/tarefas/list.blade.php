@extends('tarefas.layout')

@section('title', 'CRUD - LOGIN')

@section('content')
    <h1>CRUD + System Login</h1>

    <a href="/logout">Olá, Seja Bem Vindo - Sair</a><br />

    <a href="{{route('tarefas.add')}}">Adicionar Nova Tarefa</a>

    @if(count($list) >0)
        <ul>
            @foreach($list as $item)
                <li>
                <a href="{{ route('tarefas.done', ['id'=>$item->id] )}}">[ @if($item->resolvido===1) Desmarcar @else Marcar @endif]</a>
                {{$item->titulo}}
                <a href="{{ route('tarefas.edit', ['id'=>$item->id] )}}">[ Editar ]</a>
                    <a href="{{ route('tarefas.delete',['id'=>$item->id] )}}" onclick="return confirm('Tem certeza que deseja excluir ?')">[ Excluir ]</a>
                </li>
            @endforeach
        </ul>
    @else
        Não há Itens a serem Listados.
    @endif

@endsection

