<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use Illuminate\Http\Request;
use Alert;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('backend.admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.admin.permission.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role_id'=>'required|unique:permissions',
            'name'=>'required'
        ]);
        Permission::create($request->all());
        toast('Permission created!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->route('permissions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission =  Permission::find($id);
        return view('backend.admin.permission.index',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $permission = Permission::find($id);
        $permission->update($request->all());
        toast('Permission updated!','success')->autoClose(5000)->width('450px')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Permission::find($id)->delete();
       toast('Permission deleted!','success')->autoClose(5000)->width('450px')->timerProgressBar();
       return redirect()->route('permissions.index');

    }
}
