@extends('page')

@section('title')
    <title>Dodaj nowy post</title>
@endsection

@section('styling')
<style>
    form#main {
        width: 30%;
        min-width: 400px;
        margin: auto;
        padding: 25px;
        border: solid 3px var(--prime);
        border-radius: 25px;
        text-align: center;
        box-shadow: 10px 10px 10px black;
        
    }
    form#main h2 {
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
    form#main input, textarea {
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
    form#main input:hover, input:focus, textarea:hover, textarea:focus {
        box-shadow: 5px 4px 5px black;
        transition-duration: 0.2s;
    }
    form#main input[type="submit"] {
        margin-top: 20px;
        cursor: pointer;
    }
    form#main div.error {
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
    <form id="main" method="POST" action="/posts/create">
        @csrf
        <p>Tytuł posta: <br/>
            <input type="text" name="title" />
            @error('title')
                <div class="error">{{$message}}</div>
            @enderror
        </p>
        <p>Treść: <br/>
            <textarea name="content" style="resize: none;"></textarea>
            @error('content')
                <div class="error">{{$message}}</div>
            @enderror
        </p>
        <p>
            <input type="submit" value="Wyślij posta" />
        </p>
    </form>
@endsection