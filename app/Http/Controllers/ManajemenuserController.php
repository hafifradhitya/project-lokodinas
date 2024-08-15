<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ManajemenuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if(!empty($search)) {
            $users = User::latest()
            ->where('username', 'like', "%$search%")
            ->orWhere('nama_lengkap', 'like', "%$search%")
            ->paginate(10);
        } else {
            $users = User::orderBy('username', 'desc')->paginate(10);
        }

        return view('administrator.manajemenuser.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.manajemenuser.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            "username" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $username = $request->username;
        $level = $request->level;

        $fotoName = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file("foto");
            $fotoName = $username."_".Str::random(25).".".$foto->getClientOriginalExtension();
            $foto->move("./foto_user/", $fotoName);
        }

        User::create([
            "username" => $username,
            "email" => $request->email,
            "password" => $validated['password'],
            "level" => $level,
            "foto" => $fotoName
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.manajemenuser.index')->with(['succes'=>'Data berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        //
        $users = User::findOrFail($id);
        return view('administrator.manajemenuser.edit', compact(['users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            "username" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $users = User::findOrFail($id);

        $username = $request->username;
        $level = $request->level;

        if ($request->hasFile('foto')) {
            $foto = $request->file("foto");
            $fotoName = $username."_".Str::random(25).".".$foto->getClientOriginalExtension();
            $foto->move("./foto_user/", $fotoName);
            $users->foto = $fotoName;
        }

        $users->update([
            "username" => $username,
            "email" => $request->email,
            "password" => $validated['password'],
            "level" => $level
        ]);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.manajemenuser.index')->with(['success' => 'Data berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        //
        $users = User::findOrFail($id);
        $users->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.manajemenuser.index')->with(['success'=>'Data berhasil Dihapus']);
    }
}
