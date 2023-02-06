<header>
    <style>
        header {
            text-align: center;
            display: flex;
        }
        header h1 {
            margin: auto;
            width: 50%;
            padding-left: 25%;
            box-sizing: border-box;
        }
        header ul {
            margin: 0px;
            width: 40%;
            text-align: end;
        }
        header li {
            display: inline-block;
            box-sizing: border-box;
            margin: 10px;
            margin-left: 0px;
            padding: 15px;
            font-size: 20px;
            color: var(--prime);
            background-color: var(--background);
            border-radius: 20px;
            box-shadow: inset 2px 2px 2px black;
            transition-duration: 0.2s;
        }
        header li form#logout {
            margin: 0px;
            padding: 0px;
        }
        header li form#logout input[type="submit"] {
            color: inherit;
            background: inherit;
            border: none;
            font-size: inherit;
            font-family: inherit;
            padding: 0px;
            margin: 0px;
            cursor: pointer;
        }
        header li:hover {
            box-shadow: inset 5px 5px 5px black;
            transition-duration: 0.2s;
            cursor: pointer;
        }
    </style>
    @if(session()->has('message'))
    <style>
        header h1 {
            padding-left: 0%;
        }
    </style>
        <x-message :type="session('messageType')" :message="session('message')" />
    @endisset
    <h1><a href="/">Blog</a></h1>
    @auth
        <ul>
            <li>
                @if(auth()->user()->admin)
                    <a href="/user/manage">Witaj {{auth()->user()->name}}</a>
                @else
                <!--<a href="/user/manage">--><a href="/posts?user={{auth()->user()->id}}" title="Twoje posty">Witaj {{auth()->user()->name}}</a><!--</a>-->
                @endif
            </li>
            <li>
                <a href="posts/create">Dodaj post</a>
            </li>
            <li>
                <form id="logout" method="POST" action="/user/logout">
                    @csrf
                    <input type="submit" value="Wyloguj się" />
                </form>
            </li>
        </ul>
        @else
        <ul>
            <li>
                <a href="/user/login">Zaloguj się</a>
            </li>
            <li>
                <a href="/user/register">Zarejestruj się</a>
            </li>
        </ul>
    @endauth
</header>