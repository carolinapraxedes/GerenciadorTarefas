@extends('layouts._partials.basic')

@section('title', 'Registrar')
<h1>hello</h1>
@section('content')
    <div class="informacao-pagina">
        <div style="width:50%; margin-left:auto; margin-right:auto;">
            CRIAR NOVA CONTA
            <form action="{{route('register.store')}}" method="post">
                @csrf
                <input name="name" value="{{ old('name') }}" type="text" placeholder="name" class="borda-preta">
                {{ $errors->has('name') ? $errors->first('name') : '' }}
                <input name="email" value="{{ old('email') }}" type="text" placeholder="email" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <input name="password" value="{{ old('password') }}" type="password" placeholder="Password"
                    class="borda-preta">
                {{ $errors->has('password') ? $errors->first('password') : '' }}
                <button type="submit">Registrar</button>
            </form>
            
            {{ isset($erro) && $erro != '' ? $erro : '' }}
            <button><a href="{{route('login.index')}}">Cancelar</a></button>
        </div>
    </div>
    

@endsection