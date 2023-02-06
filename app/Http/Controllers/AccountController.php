<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AccountController extends Controller
{
    //Formularz rejestracji
    public function register():View
    {
        return view('user.register');
    }
    //Umieszczanie użytkownika w bazie danych
    public function putToDatabase(Request $request)
    {
        $form = $request->validate([
            'email' => ['required','email'],
            'name' => ['required','min:3','max:25'],
            'password' => ['required','confirmed','min:8']
        ]);
        $form['password'] = bcrypt($form['password']);
        if($request->hasFile('image')){
            $form['image'] = $request->file('image')->store('images','public');
        }
        User::create($form);
        return redirect('/posts')->with('message','Utworzono użytkownika')->with('messageType','success');
    }
    //Wyświetlenie formularza logowania
    public function login():View 
    {
        return view('user.login');
    }
    //Weryfikacja danych logowania
    public function authenticate(Request $request)
    {
        $form = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($form)){
            $request->session()->regenerate();
            return redirect('/posts')->with('message','Zalogowano poprawnie')->with('messageType','success');
        }
        return back()->with('message','Niepoprawne dane logowania')->with('messageType','error')->withErrors(["email"=>'Niepoprawne dane logowania']);
    }
    //Wyświetlenie panelu zarządzania użytkownikiem
    public function manage():View
    {
        if(!auth()->user()->admin){
            abort(403);
        }
        $types = ['Użytkownik','Administrator'];
        return view('user.manage',["users"=>User::all(),"types"=>$types]);
    }
    //Nadanie uprawnień administratora
    public function graduate(User $user)
    {
        if(!auth()->user()->admin){
            abort(403);
        }
        else{
            $user->update(['admin'=>1]);
            return redirect('/posts')->with('message',$user->email.' został administratorem')->with('messageType','success');
        }
    }
    //Usunięcie uprawnień administratora
    public function degrade(User $user)
    {
        if(!auth()->user()->admin){
            abort(403);
        }
        else{
            $user->update(['admin'=>0]);
            return redirect('/posts')->with('message',$user->email.' nie jest administratorem')->with('messageType','success');
        }
    }
    //Aktualizacja danych użytkownika
    /*public function update(Request $request)
    {
        $form = $request->validate([
            'email' => ['required','email'],
            'name' => ['required','min:3','max:25']
        ]);
        $user = auth()->user();
        $user->update($form);
        return redirect('/')->with('message','Dane zmienione pomyślnie')->with('messageType','success');
    }*/
    //Wylogowanie użytkownika
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/posts')->with('message','Wylogowano poprawnie')->with('messageType','success');
    }
    //Usuwanie użytkownika
    public function delete(User $user){
        if(!auth()->user()->admin){
            abort(403);
        }
        else{
            $nouser = $user->email;
            $user->delete();
            return redirect('/posts')->with('message',$nouser.' został usunięty')->with('messageType','success');
        }
    }
}
