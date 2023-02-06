@extends('page')

@section('title')
    <title>Zaloguj się</title>
@endsection

@section('styling')
<style>
    form {
        width: 30%;
        min-width: 400px;
        margin: auto;
        padding: 25px;
        border: solid 3px var(--prime);
        border-radius: 25px;
        text-align: center;
        box-shadow: 10px 10px 10px black;
        
    }
    form h2 {
        margin-top: 0px;
    }
    p {
        text-align: left;
        width: 75%;
        margin: 15px;
        margin-left: 12.5%;
        margin-right: 12.5%;
        font-size: 110%;
        color: var(--prime);
    }
    form input {
        outline: none;
        width: 100%;
        font-size: 110%;
        font-family: inherit;
        padding: 10px;
        margin-top: 5px;
        border: solid 3px var(--prime);
        border-radius: 15px;
        background-color: inherit;
        color: inherit;
        box-shadow: 1px 1px 1px black;
        transition-duration: 0.2s;
        color: var(--prime);
    }
    form input:hover, input:focus {
        box-shadow: 5px 4px 5px black;
        transition-duration: 0.2s;
    }
    form input[type="submit"] {
        margin-top: 20px;
        cursor: pointer;
    }
    form div.error {
	    background-color: var(--error-color);
    	border-bottom-right-radius: 10px;
    	border-bottom-left-radius: 10px;
    	width: 70%;
        margin: auto;
    	margin-top: -15px;
    	padding: 2px;
    	font-weight: bold;
	    box-sizing: border-box;
    }
</style>
@endsection

@section('content')
<form method="POST" action="/user/login">
    <h2>Zaloguj się</h2>
    @csrf
    <p>E-mail: <br/>
        <input type="text" name="email" placeholder="E-mail" value="{{old('email')}}" />
    </p>
    @error('email')
        <div class="error">{{$message}}</div>
    @enderror
    <p>Hasło: <br/>
        <input type="password" name="password" placeholder="Hasło" value="{{old('password')}}" />   
    </p>
    @error('password')
        <div class="error">{{$message}}</div>
    @enderror
    <p>
        <input type="submit" value="Zaloguj się" />
    </p>
    <p style="margin-top: 25px;">Nie masz konta?&nbsp;&nbsp;&nbsp;<a class="decorated" href="/user/register">Zarejestruj się</a></p>
</form>
@endsection