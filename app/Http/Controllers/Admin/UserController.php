<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();

        $data = [
            'users' => $users
        ];

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        $data = [
            'users' => $users
        ];

        return view('admin.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $data = [
            'users' => $users
        ];

        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'company_name' => ['required', 'string', 'max:50'],
            'owner_name' => ['required', 'string', 'max:50'],
            'owner_lastname' => ['string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'cap' => ['required', 'string', 'max:10'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:50'],
            'dob' => ['required', 'date'],
            'piva' => ['required', 'string', 'max:11'],
            'iban' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'email', 'max:50', 'unique:users,email,'. $user->id],
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'],
        ]);

        $form_data = $request->all();

        $user->update($form_data);

        return redirect()->route('admin.user.index');
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
}
