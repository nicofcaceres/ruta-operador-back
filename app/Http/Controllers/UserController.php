<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users',[
            'users' => User::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'name' => 'required',
            'last_name' => 'required',
            'doc_type' => 'required',
            'document' => 'required',
            'phone_number' => ['required','numeric'],
            'password' => 'required',
        ]);

        $validated['password'] = Hash::make( $validated['password'] );
        $validated['is_technical'] = (empty($request->is_technical))?0:1;
        User::create($validated);

        return redirect('/usuarios');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user): RedirectResponse
    {
        /* echo '<pre>';
        var_dump($user);
        echo '<pre/>';
        exit(); */
        $validated = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'doc_type' => 'required',
            'document' => 'required',
            'phone_number' => ['required','numeric'],
        ]);
        $validated['is_technical'] = (empty($request->is_technical))?0:1;
        User::find($user)->update($validated);
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user): RedirectResponse
    {
        User::destroy($user);
        return redirect('/usuarios');
    }
}
