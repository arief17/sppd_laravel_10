<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\LevelAdmin;
use App\Models\Seksi;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Daftar User',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Tambah User',
            'level_admins' => LevelAdmin::all(),
            'seksis' => Seksi::all(),
            'bidangs' => Bidang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'username' => 'required|alpha_dash|min:3|max:100|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()->numbers()],
            'level_admin' => 'required',
            'seksi' => 'required',
            'bidang' => 'required',
        ]);
        
        User::create($validatedData);
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', [
            'title' => 'Detail User',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Perbarui User',
            'user' => $user,
            'level_admins' => LevelAdmin::all(),
            'seksis' => Seksi::all(),
            'bidangs' => Bidang::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'username' => 'required|alpha_dash|min:3|max:100|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()->numbers()],
            'level_admin' => 'required',
            'seksi' => 'required',
            'bidang' => 'required',
        ]);
        
        User::where('id', $user->id)->update($validatedData);
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
