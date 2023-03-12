@extends('layouts._partials.basic')

@section('title', 'Login')
<h1>hello</h1>
@section('content')
    <div class="informacao-pagina">
        <div style="width:50%; margin-left:auto; margin-right:auto;">
            <form action="{{route('login.auth')}}" method="post">
                @csrf
                <input name="user" value="{{ old('user') }}" type="text" placeholder="User" class="borda-preta">
                {{ $errors->has('user') ? $errors->first('user') : '' }}
                <input name="password" value="{{ old('password') }}" type="password" placeholder="Password"
                    class="borda-preta">
                {{ $errors->has('password') ? $errors->first('password') : '' }}
                <button type="submit">Sign In</button>
            </form>
            <button><a href="{{route('register.create')}}"> Registrar conta</a></button>
            {{ isset($erro) && $erro != '' ? $erro : '' }}
        </div>
    </div>
    

@endsection
