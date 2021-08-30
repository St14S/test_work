<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role_Perm;
use App\Models\Role_User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function checkPermission(Request $request)
    {
        if ($request->has(['user_id', 'perm_name'])) {
            $user_id = $request->input('user_id');
            $perm_name = $request->input('perm_name');
            return Role_User::query()
                ->join('roles', 'roles.id', '=', 'role__users.role_id')
                ->join('role__perms', 'roles.id', '=', 'role__perms.role_id')
                ->join('permissions', 'role__perms.perm_id', '=', 'permissions.id')
                ->select('role__users.user_id', 'permissions.name')
                ->where(['role__users.user_id' => $user_id, 'permissions.name' => $perm_name])
                ->distinct()
                ->get();
        }
    }
}
