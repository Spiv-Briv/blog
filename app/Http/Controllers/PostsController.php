<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //pokazuje wszystkie posty
    public function index(Request $request)
    {
        $posts = Posts::latest()->filter(request(['search','user']))->simplePaginate(8);
        return view('post.all',['posts'=>$posts]);
    }
    //pokzuje konkretnego posta
    public function show(Posts $post):View
    {
        $user = User::find($post->UserId);
        return view('post.show',['post'=>$post,'user'=>$user]);
    }
    //Wyświetla formularz tworzenia posta
    public function create():View
    {
        return view('post.new',['userData'=>auth()->user()]);
    }
    //Dodaje posta do bazy danych
    public function store(Request $request)
    {
        $form = $request->validate([
            'title' => ['required','max:50'],
            'content' => ['required','max:2000']
        ]);
        $form['UserId'] = auth()->user()->id;
        Posts::create($form);
        return redirect('/posts')->with('message','Dodano posta')->with('messageType','success');
    }
    //Wyświetla formularz edytowania posta
    public function edit(Posts $post):View
    {
        return view('post.edit',['post'=>$post]);
    }
    //aktualizuje post
    public function update(Posts $post, Request $request)
    {
        if(auth()->user()->id!=$post->UserId){
            abort(403);
        }
        $form = $request->validate([
            'title' => ['required','max:50'],
            'content' => ['required','max:2000']
        ]);
        $form['UserId'] = auth()->user()->id;
        $post->update($form);
        return redirect('/posts')->with('message','Zaktualizowano posta')->with('messageType','success');
    }
    public function delete(Posts $post, Request $request){
        if(auth()->user()->id!=$post->UserId&&!auth()->user()->admin){
            abort(403);
        }
        $post->delete();
        return redirect('/posts')->with('message','Usunięto posta')->with('messageType','success');
    }
}
