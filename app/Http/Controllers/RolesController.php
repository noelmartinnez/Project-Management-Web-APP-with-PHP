<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller {
    public function list() {
        $roles = Role::simplePaginate(5);
        return view('admin.roles.list', ['roles' => $roles]);
    }

    public function create() {
        return view('admin.roles.create', ['role' => null]);
    }

    public function update($id) {
        $role = Role::find($id);
        return view('admin.roles.create', ['role' => $role]);
    }

    public function save_new(Request $req) {
        $req->validate([
            'name' => 'required|max:255',
        ]);
        $new_role = new Role();
        $new_role->name = $req->input('name');
        $new_role->save();
        return $this->list();
    }

    public function save_updated(Request $req) {
        $req->validate([
            'name' => 'required|max:255',
        ]);
        $role = Role::find($req->input('id'));
        $role->name = $req->input('name');
        $role->save();
        return $this->list();
    }

    public function delete($role_id) {
        $role = Role::find($role_id);
        $role?->delete();
        return redirect('/admin/roles');
    }
}
