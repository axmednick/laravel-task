<?php

namespace App\Http\Controllers\Admin;

use App\Admins;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();

        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'delete'=>$request->delete ? 'true' :'false',
            'create'=>$request->create ? 'true' :'false',
            'update'=>$request->update ? 'true' :'false',
        ];
        $data=json_encode($data);
        $Roles=new Role();
        $Roles->name=$request->name;
        $Roles->permission=$data;
        $Roles->save();
        return back()->with('success','Role Saved');

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
        //
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
        $admins=Admins::find($id);
        $admins->role_id=$request->role;
        $admins->save();
        return back()->with('success','Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function admins(){
        $admins=Admins::all();
        $roles=Role::all();

        return view('admin.roles.admins',compact('admins','roles'));
    }
}
