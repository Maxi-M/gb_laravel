<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(config('app.pageSize'));
        return view('admin.users.index', ['users' => $users]);
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id !== \Auth::user()->id) {
            $user->is_admin = !$user->is_admin;
            $user->save();
        }
        return redirect()->route('admin.users.index');
    }
}
