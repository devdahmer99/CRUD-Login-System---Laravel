@extends('tarefas.layout')

@section('title', 'Cadastro')

@section('content')

    @if(session('warning'))
        <x-alert>
            <?= session('warning');?>
        </x-alert>
    @endif

    @if($errors->any())
        <ul>
            <x-alert>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </x-alert>
        </ul>
    @endif

    <form method="POST" action="">
        @csrf
        <input type="text" name="name" placeholder="Digite o seu nome" value="{{ old('name') }}"/><br /><br />
        <input type="email" name="email" placeholder="Digite um email" value="{{old('email')}}"/><br /><br />
        <input type="password" name="password" placeholder="Digite uma senha"/><br /><br />
        <input type="password" name="password_confirmation" placeholder="Confirme a sua senha"/><br /><br />
        <input type="submit" value="Cadastrar" />
    </form>

@endsection

