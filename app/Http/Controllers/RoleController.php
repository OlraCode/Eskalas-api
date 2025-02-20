<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->get('name'),
        ]);

        return response()->json(['message' => 'Role created with success']);
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function update(Request $request, int $role)
    {
        Role::where('id', $role)
            ->update([
                'name' => $request->get('name')
            ]);

        return response()->json(['message' => 'Role updated with success']);
    }

    public function destroy(int $role)
    {
        Role::destroy($role);

        return response()->json(['message' => 'Role deleted with success']);
    }
}
