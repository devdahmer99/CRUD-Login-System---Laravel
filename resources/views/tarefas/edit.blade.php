@extends('tarefas.layout')

@section('title', 'Edição de Tarefas')

@section('content')
    <h1>Edição de Tarefas</h1>
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
        <input type="text" name="titulo" value="{{$data->titulo}}" /><br />

        <input type="submit" value="Salvar" />
    </form>


@endsection

