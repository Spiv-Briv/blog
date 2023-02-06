@extends('page')

@section('title')
    <title>Zarządzaj kontami</title>
@endsection

@section('styling')
    <style>
        table {
            border-radius: 15px;
            border: solid 3px var(--prime);
            box-shadow: 5px 5px 5px black;
            margin: auto;
            border-spacing: 0px;
        }
        thead td {
            border-bottom: solid 3px var(--prime);
            padding: 15px;
        }
        thead tr {
            box-shadow: 0px 2px 2px black;
        }
        tbody td {
            padding: 25px;
        }
        tbody tr {
            box-shadow: 0px 1px 1px black;
        }
        form#delete input {
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
            float: left;
        }
        form#delete input:hover {
            box-shadow: 5px 5px 5px black;
            transition-duration: 0.2s;
        }
        td.actions {
            height: 46px;
            display: flex;
            flex-wrap: nowrap;
        }
        td.actions > * {
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Nazwa użytkownika</td>
            <td>Adres E-mail</td>
            <td>Typ</td>
            <td>Akcje</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$types[$user->admin]}}</td>
            <td class="actions">
                <!--Zmiana uprawnień-->
                @if(!$user->admin)
                    <a class="decorated" href="/user/{{$user->id}}/graduate">Nadaj administratora</a>
                @else
                    <a class="decorated" href="/user/{{$user->id}}/degrade">Usuń administratora</a>
                @endif
                <!--Usunięcie konta-->
                <form id="delete" method="POST" action="/user/{{$user->id}}/delete">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Usuń konto" />
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection