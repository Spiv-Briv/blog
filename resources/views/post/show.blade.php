@extends('page')

@section('title')
    <title>{{$post->title}}</title>
@endsection

@section('styling')
    <style>
        div.post {
            margin: auto;
            width: 50%;
            min-width: 500px;
            border: solid 3px var(--prime);
            border-radius: 25px;
            box-shadow: 5px 5px 5px black;
        }
        div.post div.account {
            display: grid;
            grid-template-columns: min-content auto 150px;
            padding: 15px;
        }
        div.account div.user_data {
            padding: 20px;
        }
        div.account div.actions {
            text-align: center;
        }
        div.post img {
            width: 150px;
            height: 150px;
        }
        div.post > h1, div.post div.account {
            border-bottom: solid 3px var(--prime);
            padding: 30px;
            margin: 0px;
            transition-duration: 0.2s;
        }
        div.post > h2 {
            padding: 30px;
            margin: 0px;
            transition-duration: 0.2s;
        }
        div.post > h1:hover, div.post > h2:hover, div.post div.account:hover {
            box-shadow: 0px 5px 5px black;
            border-radius: 25px;
            transition-duration: 0.2s;
        }
        div.post p {
            margin-top: 35px;
            padding: 0px;
        }
        form#delete input {
            margin-top: 20px;
            color: inherit;
            background-color: inherit;
            padding: 10px;
            text-decoration: none;
            border: 2px solid var(--error-color);
            border-radius: 10px;
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
            font-size: 16px;
            font-family: inherit;
            transition-duration: 0.2s;
        }
        form#delete input:hover {
            box-shadow: 5px 5px 5px black;
            transition-duration: 0.2s;
        }
    </style>
@endsection

@section('content')
    <div class="post">
        
        <div class="account">
            <img src="{{$user->image ? asset($user->image) : asset('images/no_image.png')}}" alt="User Image" />
            <div class="user_data">
                <h2>{{$user->name}}</h2>
                <h4>{{$user->email}}</h4>
            </div>
            <div class="actions">
                <a class="decorated" style="margin-right: 10px;" href="/posts"><- Powrót</a>
                @auth
                    @if (auth()->user()->id==$post->UserId)
                        <p class="actions">
                            <a class="decorated" href="/posts/{{$post->id}}/edit">Edytuj posta</a>
                        </p>
                        <form id="delete" method="POST" action="/posts/{{$post->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Usuń posta" />
                        </form>
                    @endif
                    @if(auth()->user()->admin&&auth()->user()->id!=$post->UserId)
                        <form id="delete" method="POST" action="/posts/{{$post->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Usuń posta (Admin)" />
                        </form>
                    @endif
                @endauth
            </div>
        </div>
        <h1>{{$post->title}}</h1>
        <h2>{{$post->content}}</h2>
        
    </div>
@endsection