<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $erro = $request->get('erro');

        if($request->get('erro')==1){
            $erro = 'Usuário ou senha não existe';
        }

        if($request->get('erro')==2){
            $erro = 'Necessário realizar login para ter acesso';
        }

        return view('login.index',['title'=>'Sign in','erro'=>$erro]);
       
    }
    public function auth(Request $request)
    {
        $roles = [
            
            'email'=>'email',
            'password'=>'required|min:8',
        ];
        $msg = [
            
            'email.email'=>'O campo usuário(e-mail) é obrigatório',
            'password.required'=> 'O campo senha é obrigatório',
            'password.min'=> 'Sua senha precisa ter no mínimo 8 dígitos',
        ];       
        $request->validate($roles,$msg);

         //recuperando os parametros do formulario
         $email=$request->get('user');
         $password=$request->get('password');
 

         $user = new User(); 
         //verifica se a login/senha passada é igual a registrada no banco
         $userForm = $user->where('email',$email)
                     ->where('password',$password)
                     ->get()
                     ->first();
 
         if(isset($userForm->name)){
             //se o usuario existe, vai começar uma session
             session_start();
             $_SESSION['name']=$userForm->name;
             $_SESSION['email']=$userForm->email;
 
             return redirect()->route('app.home');
         }else{
             return redirect()->route('login.index',['erro'=>1]);
         }
        

    }

    public function logout(){
        session_destroy();
        return redirect()->route('login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('login.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
