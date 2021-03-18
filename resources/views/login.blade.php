@extends('tarefas.layout')

@section('title', 'Lista de Tarefas')

@section('content')

    @if(session('warning'))
        <x-alert>
            <?= session('warning');?>
        </x-alert>
    @endif

    <form method="POST" action="">
     @csrf
        <input type="email" name="email" placeholder="digite um email" /><br /><br />
        <input type="password" name="password" placeholder="Digite uma senha"/><br /><br />

        <input type="submit" value="Login" />
    </form>

@endsection

