<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    
    public function index()
    {
        $listBreadCrumb = json_encode([
            ["title" => "Home", "url" => route('home')],
            ["title" => "Listagem de Artigos", "url" => ""]
        ]);

        $listArticles = json_encode([
            ["id" =>1, "title" => "Laravel & Vue", "description" => "Curso de Laravel & vue"],
            ["id" =>2, "title" => "VueJs", "description" => "Curso de VueJs"],
            ["id" =>3, "title" => "Vue 2", "description" => "Curso de Vue2"],
            ["id" =>4, "title" => "Angular", "description" => "Curso de Angular 5"],            
            ["id" =>5, "title" => "Bootstrap", "description" => "Bootstrap"]            
        ]);

        return view("admin.articles.index", compact('listBreadCrumb', 'listArticles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
