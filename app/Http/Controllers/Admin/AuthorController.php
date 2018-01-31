<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    public function index()
    {
        $listBreadCrumb = json_encode([
            ["title" => "Home", "url" => route('home')],
            ["title" => "Listagem de Autores", "url" => ""]
        ]);
        $listing = User::select('id', 'name', 'email')->where('author', '=', 'Y')->paginate(4);   
        
        return view("admin.authors.index", compact('listBreadCrumb', 'listing'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validation = \Validator::make($data,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect()->back();
    }

    public function show($id)
    {
        return User::find($id);
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();

      if(isset($data['password']) && $data['password'] != ""){
        $validation = \Validator::make($data,[
          'name' => 'required|string|max:255',
          'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($id)],
          'password' => 'required|string|min:6',
        ]);
        $data['password'] = bcrypt($data['password']);
      }else{
        $validation = \Validator::make($data,[
          'name' => 'required|string|max:255',
          'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($id)]
        ]);
        unset($data['password']);
      }



      if($validation->fails()){
        return redirect()->back()->withErrors($validation)->withInput();
      }

      User::find($id)->update($data);
      return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();       
        return redirect()->back();
    }
}
