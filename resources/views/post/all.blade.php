@extends('page')

@section('title')
    <title>Wszystkie posty</title>
@endsection

@section('styling')
<style>
    section.postsContainer {
        padding: 25px;
    }
    div.poster {
        background-color: var(--prime);
        color: var(--background);
        float: left;
        width: 300px;
        height: 150px;
        padding: 25px;
        margin: 15px;
        border-radius: 25px;
        box-shadow: 5px 5px 5px black;
        cursor: pointer;
        overflow: hidden;
        text-overflow: ellipsis;
        transition-duration: 0.2s;
    }
    div.poster:hover {
        scale: 1.1;
        transition-duration: 0.2s;
    }
    div.pagination {
        width: 100%;
        padding: 25px;
        box-sizing: border-box;
    }
    div.pagination a {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
@include('fragments/_searchbar')
<div class="pagination">{{ $posts->links() }}</div>
<section class="postsContainer">
    @foreach ($posts as $post)
    <a href="/posts/{{$post->id}}">
        <div class="poster">
            <h3>{{$post->title}}</h3>
            <p>{{$post->content}}</p>
        </div>
    </a>
    @endforeach
</section>

@endsection