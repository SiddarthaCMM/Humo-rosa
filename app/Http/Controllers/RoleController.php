<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
    }

    public function create()
    {
        $role = new Role;
        $role->name = 'Admin';
        $role->key_name = 'admin';
        $role->save();
    }

    public function update()
    {
        $role = Role::find(1);
        $role->name = 'Gerente';
        $role->key_name = 'gerente';
        $role->save();
    }

    public function delete()
    {
        Role::find(1)->delete();
    }
}
