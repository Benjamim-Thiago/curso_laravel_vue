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
            ["title" => "Listagem de Compras", "url" => ""]
        ]);
        return view("admin.articles.index", compact('listBreadCrumb'));
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
