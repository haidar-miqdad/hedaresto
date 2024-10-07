<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
        ->when($request->input('name'), function($query, $name) {
            return $query->where('name' , 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request){

        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'roles' => 'required',
                'password' => 'required',
            ]);
    
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
    
            return redirect()->route('user.index')->with('success', 'User created successfully.');
        }catch(\Exception $th){
            return redirect()->route('user.index')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
       $data = $request->validated();
       $user->update($data);
       return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
