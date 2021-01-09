<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PermissionsController extends Controller
{
    /**
    *
    * allow admin only
    *
    */

    public function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  \App\Http\Requests\StorePermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'success';
        $content = 'Permission Created!';

        $request->validate([
            'name' => ['required','unique:permissions'],
        ]);

        $permission = Permission::create($request->all());

        return redirect()->route('permissions.index')->with('process_result',['status' => $status, 'content' => $content]);
    }


    /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = 'Updated Permission!';

        $request->validate([
            'name' => ['required','string', 'max:20', Rule::unique('permissions')->ignore($id)],
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        return redirect()->route('permissions.index')->with('process_result',['status' => $status, 'content' => $content]);
    }


    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('danger', "El permiso $permission->name fue eliminado con éxito!");
    }

    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
