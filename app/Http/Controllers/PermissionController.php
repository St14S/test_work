<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return response()->json($permission, 201);
    }
}
