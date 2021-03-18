@extends('tarefas.layout')

@section('title', 'Adição de Tarefas')

@section('content')
    <h1>Adição de Tarefas</h1>
    @if($errors->any())
    <x-alert>
        @foreach($errors->all() as $error)
            {{ $error }}<br />
        @endforeach
    </x-alert>
    @endif

    <form method="post">
    @csrf
        <label>Titulo:</label><br />
        <input type="text" name="titulo" /><br />

        <button submit="submit" value="adicionar">Adicionar</button>
    </form>


@endsection
