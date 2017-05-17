<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\A_Users;

class A_UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index() {
        $users = A_Users::where('role', '<>', '')
                ->orderBy('created_at', 'desc')
                ->paginate();
        //$tentangs = DB::table('tentang')->paginate(1);
        return view('admin.users.index', ['users' => $users]);
    }

    public function show($id) {

        $user = A_Users::where('id', $id)->first();

        if (!$user) {
            abort(404);
        }

        return view('admin.users.single')->with('user', $user);
    }

    public function destroy($id) {
        $objek = A_Users::find($id);
        $objek->delete();
        return redirect('admin/users')->with('message', 'User berhasil dihapus');
    }

    public function edit($id) {
        $user = A_Users::find($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'role' => 'required',
        ]);

        $user = A_Users::find($id);
        $user->role = $request->role;

        $user->save();

        return redirect('admin/users')->with('message', 'Role user berhasil diubah');
    }

}
