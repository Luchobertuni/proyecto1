<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show(){
      $posts = \App\Post::all();

   $variables = [
       "posts" => $posts,
   ];

   return view('perfil', $variables);
    }

  

}
