<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{
    
    public function index()
    {
        $listBreadCrumb = json_encode([
            ["title" => "Home", "url" => route('home')],
            ["title" => "Listagem de Usuários", "url" => ""]
        ]);
        $listing = User::select('id', 'name', 'email')->paginate(2);   
        
        return view("admin.users.index", compact('listBreadCrumb', 'listing'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = new User;

        $data['password']=bcrypt($data['password']);

        $user = $user->create($data);

        if(!$user){
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->back();
    }

    public function show($id)
    {
        return User::find($id);
    }
    
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = new User;

        $data['password']=bcrypt($data['password']);

        $user = $user->find($id)->update($data);

        if(!$user){
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();       
        return redirect()->back();
    }
}
