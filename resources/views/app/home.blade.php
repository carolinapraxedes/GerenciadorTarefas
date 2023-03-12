@extends('layouts._partials.basic')

@section('title', 'Home')
@section('content')
    
    <div class="informacao-pagina">
        <div style="width:50%; margin-left:auto; margin-right:auto;">
                <h3>login deu certo</h3>
                <button><a href="{{route('login.logout')}}">Sair</a></button>
        </div>
    </div>
    

@endsection