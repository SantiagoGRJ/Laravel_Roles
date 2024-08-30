<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles=DB::table('roles')->get();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //


    
        return Redirect::route('admin.index')->with('status','User Create success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        //
        return view('user.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $id)
    {
        //
        $id->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        //
        $id->delete();
    }
}
