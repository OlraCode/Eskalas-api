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
        $updated = Role::where('id', $role)
            ->update([
                'name' => $request->get('name')
            ]);

        if ($updated) {
            return response()->json(['message' => 'Role updated with success']);
        }

        return response()->json(['message' => 'Role not found'], 404);
    }

    public function destroy(int $role)
    {
        $deleted = Role::destroy($role);

        if ($deleted) {
            return response()->json(['message' => 'Role deleted with success']);
        }

        return response()->json(['message' => 'Role not found'], 404);
    }
}
