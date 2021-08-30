<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Role_Perm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolePermController extends Controller
{
    public function index()
    {
        return Role_Perm::query()
            ->join('roles', 'roles.id', '=', 'role_id')
            ->join('permissions', 'permissions.id', '=', 'perm_id')
            ->select('role_id', 'perm_id', 'roles.name as roles_name', 'permissions.name as perm_name')
            ->get();
    }

    public function store(Request $request)
    {
        if ($request->has(['role_id', 'perm_id'])) {
            $perm_id = $request->input("perm_id");
            $role_id = $request->input("role_id");
            $role = Role_Perm::create(['role_id' => $role_id, 'perm_id' => $perm_id]);
        }
        return response()->json($role, 201);

        $role_perm = Role_Perm::create($request->all());
        return response()->json($role_perm, 201);
    }
}
