<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
  public function index()
  {
      $users = User::all();
      return view('Admin.User.index',compact('users'));
  }




  public function UserUpdate(User $user)
  {
        $roles = Role::all();

         return view('Admin.User.update')->with([
           'user' => $user,
           'roles'=> $roles
         ]);

  }

  public function update(Request $request,User $user)
  {
    $user->roles()->sync($request->roles);

      return redirect()->route('user_index')
                ->with('success','User updated successfully.');
  }


  public function delete(User $user)
  {
      $user->roles()->delete();


      return redirect()->route('user_index')
                ->with('success','User Deleted successfully.');
  }

}
