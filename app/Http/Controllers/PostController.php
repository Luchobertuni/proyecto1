<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function mostrar(){
    $posts = \App\Post::all();

 $variables = [
     "posts" => $posts,
 ];

 return view('posts', $variables);
  }

  public function show($id) {
	$post = \App\Post::find($id);

	$variables = [
		"post" => $post,
	];

	return view('post', $variables);
}
public function destroy($id) {
   $post = \App\Post::find($id);

   $post::destroy($id);

   return redirect('/posts');
}


  public function agregar(){
    return view('agregar');
  }

      public function store(Request $request) {
    $rules = [
        "lugar" => "required",
        "transporte" => "required",
        "duracion" => "required|numeric",
        "presupuesto" => "required|numeric"
    ];

    $messages = [
        "required" => "El :attribute es requerido!",
        "numeric" => "El :attribute tiene que ser numérico!"

    ];

    $request->validate($rules, $messages);

    $posteo = \App\Post::create([
        'lugar' => $request->input('lugar'),
        'transporte' => $request->input('transporte'),
        'duracion' => $request->input('duracion'),
        'presupuesto' => $request->input('presupuesto')
    ]);

    return redirect('/');
}

  public function edit($id){
    $post = \App\Post::find($id);

  	$variables = [
  		"post" => $post,
  	];

  	 return view('edit', $variables);
  }

  public function update(Request $request, $id){
    $post = \App\Post::find($id);

    $post->lugar = $request->input('lugar');
    $post->transporte = $request->input('transporte');
    $post->duracion = $request->input('duracion');
    $post->presupuesto = $request->input('presupuesto');
    $post->comentarios = $request->input('comentarios');
    $post->save();

    return redirect('/post/' . $id);
  }


}
