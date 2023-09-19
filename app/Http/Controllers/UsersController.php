<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $orderBy = request()->input('order_by');
        $search = request()->input('search');
        $searchEmail = request()->input('searchEmail');

        $defaultOrder = 'asc';
        $orderByField = 'id';

        $users = User::orderBy($orderByField, $defaultOrder)->simplePaginate(4);

        if ($orderBy == 'name') {
            $orderByField = 'name';
            $users = User::orderBy($orderByField, $defaultOrder)->simplePaginate(4);
        }

        if ($orderBy == 'email') {
            $orderByField = 'email';
            $users = User::orderBy($orderByField, $defaultOrder)->simplePaginate(4);
        }

        if ($orderBy == 'role_id') {
            $orderByField = 'role_id';
            $users = User::orderBy($orderByField, $defaultOrder)->simplePaginate(4);
        }

        if(!empty($search)) {
            $users = User::whereRaw('LOWER(name) LIKE ?', ["%".strtolower($search)."%"])->simplePaginate(4);
        }

        if(!empty($searchEmail)) {
            $users = User::whereRaw('LOWER(email) LIKE ?', ["%".strtolower($searchEmail)."%"])->simplePaginate(4);
        }

        return view('/admin/users/index', ['users' => $users, 'orderBy' => $orderBy, 'search' => $search, 'searchEmail' => $searchEmail]);
    }

    public function searchByName(Request $request){
        $search = $request->input('search');
        return redirect()->route('users.index', ['search' => $search]);
    }

    public function searchByEmail(Request $request){
        $searchEmail = $request->input('searchEmail');
        return redirect()->route('users.index', ['searchEmail' => $searchEmail]);
    }

    public function orderByName() {
        return redirect()->route('users.index', ['order_by' => 'name']);
    }

    public function orderByEmail() {
        return redirect()->route('users.index', ['order_by' => 'email']);
    }

    public function orderByRol() {
        return redirect()->route('users.index', ['order_by' => 'role_id']);
    }

    public function create() {
        return view('/admin/users/create', ['roles' => Role::all()]);
    }

    public function store(Request $request) {
        $validacion = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|max:255',
            'rol' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('rol');
        $user->save();

        return redirect("/admin/users");
        //return view('users.message', ['msg' => "Usuario Creado Correctamente"]);
    }

    public function edit($id) {
        $user = User::find($id);
        return view('/admin/users/edit', ['id' => $id, 'user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request, $id) {
        $validacion = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email,' . $id,
            'password' => 'required|max:255',
            'rol' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('rol');
        $user->save();

        return redirect("/admin/users");
        //return view('users.message', ['msg' => "Usuario Modificado Correctamente"]);
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect("/admin/users");
    }
}
