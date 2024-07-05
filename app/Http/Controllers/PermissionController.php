<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request) {
        $permissions = Permission::orderBy('id','DESC')->paginate(10);
        return view('admin.permissions.index',compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create() {
        return view('admin.permissions.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        DB::beginTransaction();

        try{
            $perm = new Permission;
            $perm->name = $request->name;
            $perm->guard_name = 'web';

            $perm->save();

            DB::commit();
            return redirect()->route('permissions.index')->with('success', 'Permissão criada com sucesso!');
        }catch(QueryException|\Exception $exception) {
            DB::rollBack();
            return back()->withInput()->with('error', $exception->getMessage());
        }
    }

    public function destroy(int $id) {
        $perm = Permission::where('id', $id)->first();
        $perm->delete();
        return redirect()->route('permissions.index')->with('success', 'Permissão deletada com sucesso!');
    }
}
