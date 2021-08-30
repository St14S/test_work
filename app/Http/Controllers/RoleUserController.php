<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Role_User;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function index()
    {
        return Role_User::query()
            ->join('roles', 'roles.id', '=', 'role_id')
            ->join('users', 'users.id', '=', 'user_id')
            ->select('role_id', 'user_id', 'roles.name as roles_name', 'users.name as user_name')
            ->get();
    }

    public function store(Request $request)
    {
        if ($request->has(['role_id', 'user_id'])) {
            $user_id = $request->input("user_id");
            $role_id = $request->input("role_id");
            $role = Role_User::create(['role_id' => $role_id, 'user_id' => $user_id]);
        }
        return response()->json($role, 201);
    }
}
