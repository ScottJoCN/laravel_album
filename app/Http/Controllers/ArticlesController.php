<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
class ArticlesController extends Controller
{
    //
    public function create(){
    	return view('article.create');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'title' => 'required|max:50',
    		'intro' => 'max:150',
    	]);

    	$article = Article::create([
    		'title' => $request->title,
    		'intro' => $request->intro,
    		'content' => $request->content,
    	]);

    	session()->flash('success','create successful');
    	return redirect()->route('markhome');
    }
    public function show($id){
    	$article = Article::findOrFail($id);
    	return view('article.show',compact('article'));
    }
}
