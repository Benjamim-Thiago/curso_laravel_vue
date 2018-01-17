<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article\Article;

class ArticleController extends Controller
{
    
    public function index()
    {
        $listBreadCrumb = json_encode([
            ["title" => "Home", "url" => route('home')],
            ["title" => "Listagem de Artigos", "url" => ""]
        ]);
         $listArticles = json_encode(Article::select('id', 'title', 'description','date')->get());   
        /*$listArticles = json_encode([
            ["id" =>1, "title" => "Laravel & Vue", "description" => "Curso de Laravel & vue", "date"=>"2017-12-03"],
            ["id" =>2, "title" => "VueJs", "description" => "Curso de VueJs", "date"=>"2017-09-05"],
            ["id" =>3, "title" => "Vue 2", "description" => "Curso de Vue2", "date"=>"2018-01-16"],
            ["id" =>4, "title" => "Angular", "description" => "Curso de Angular 5", "date"=>"2018-01-17"],            
            ["id" =>5, "title" => "Bootstrap", "description" => "Bootstrap", "date"=>"2018-01-14"]            
        ]);*/


        return view("admin.articles.index", compact('listBreadCrumb', 'listArticles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all());
        Article::create($request->all());
        return redirect()->back();
    }
 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
