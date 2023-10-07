<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\LevelAdmin;
use App\Models\Pegawai;
use App\Models\Seksi;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.pegawai.index', [
            'title' => 'Daftar Pegawai',
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.pegawai.create', [
            'title' => 'Tambah Pegawai',
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all(),
            'level_admins' => LevelAdmin::all(),
            'seksis' => Seksi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create Pegawai
        $validatedPegawai = $request->validate([
            'nama' => 'required|min:3|max:100',
            'nip' => 'required|integer|unique:pegawais',
            'ruang' => 'required|max:10',
            'eselon_id' => 'required',
            'jabatan_id' => 'required',
            'pptk' => '',
        ]);

        if (!$request->pptk) {
            $validatedPegawai['pptk'] = 0;
        }

        $validatedPegawai['slug'] = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
        $validatedPegawai['author_id'] = auth()->user()->id;

        // Create User
        $validatedUser = $request->validate([
            'nama' => 'required|min:3|max:100',
            'username' => 'required|alpha_dash|min:3|max:100|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()->numbers()],
            'level_admin_id' => 'required',
            'seksi_id' => 'required',
        ]);

        $validatedUser['password'] = Hash::make($request->password);
        
        $user = User::create($validatedUser);
        $validatedPegawai['user_id'] =  $user->id;
        Pegawai::create($validatedPegawai);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view('dashboard.master.pegawai.show', [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('dashboard.master.pegawai.edit', [
            'title' => 'Perbarui Pegawai',
            'pegawai' => $pegawai,
            'jabatans' => Jabatan::all(),
            'golongans' => Golongan::all(),
            'level_admins' => LevelAdmin::all(),
            'seksis' => Seksi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        // Update Pegawai
        $rulesPegawai = [
            'nama' => 'required|min:3|max:100',
            'ruang' => 'required|max:10',
            'eselon_id' => 'required',
            'jabatan_id' => 'required',
            'pptk' => '',
        ];

        if ($request->nip != $pegawai->nip) {
            $rulesPegawai['nip'] = 'required|integer|unique:pegawais|max:20';
        }
        $validatedPegawai = $request->validate($rulesPegawai);

        if (!$request->pptk) {
            $validatedPegawai['pptk'] = 0;
        }

        $validatedPegawai['slug'] = SlugService::createSlug(Pegawai::class, 'slug', $request->nama);
        $validatedPegawai['author_id'] = auth()->user()->id;

        // Update User
        $rulesUser = [
            'username' => 'required|alpha_dash|min:3|max:100|unique:users',
            'password' => ['required', 'confirmed', Password::min(5)->letters()->numbers()],
            'level_admin_id' => 'required',
            'seksi_id' => 'required',
        ];

        if ($request->username != $pegawai->username) {
            $rulesUser['username'] = 'required|alpha_dash|min:3|max:100|unique:users';
        }
        $validatedUser = $request->validate($rulesUser);
        
        $validatedUser['password'] = Hash::make($request->password);
        
        User::where('id', $pegawai->user->id)->update($validatedUser);
        Pegawai::where('id', $pegawai->id)->update($validatedPegawai);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
