<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article\Article;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = new User;
        $counts = [
            "articles" => Article::count(),
            "users" => $users->count(),
            "authors" => $users->where('author', '=', 'Y')->count()
        ];
        $listBreadCrumb = json_encode([
            ["title" => "Home", "url" => ""]
        ]);
        return view('home', compact('listBreadCrumb', 'counts'));
    }
}
