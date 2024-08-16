<?php

namespace App\Http\Controllers;

use App\Models\Manajemenmodul;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class ManajemenmodulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if(!empty($search)) {
            $manajemenmodul = Manajemenmodul::latest()
            ->orWhere('nama_modul', 'like', "%$search%")
            ->paginate(10);
        } else {
            $manajemenmodul = Manajemenmodul::paginate(10);
        }

        return view('administrator.manajemenmodul.index', compact(['manajemenmodul']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.manajemenmodul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            'nama_modul' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'publish' => 'required|in:Y,N',
            'aktif' => 'required|in:Y,N',
            'status' => 'required|in:user,admin',
        ]);

        Manajemenmodul::create([
            'link_seo' => Str::slug($validated['nama_modul']),
            'nama_modul' => $validated['nama_modul'],
            'publish' => $validated['publish'],
            'aktif' => $validated['aktif'],
            'status' => $validated['status']
        ]);

        session()->flash("pesan", "MenuWebsite berhasil Ditambah");
        return redirect()->route('administrator.manajemenmodul.index')->with(['success'=>'Berita berhasil Ditambah']);
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
        $manajemenmodul = Manajemenmodul::findOrFail($id);

        return view('administrator.menuwebsite.edit', compact('menuwebs', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $manajemenmodul = Manajemenmodul::findOrFail($id);

        $validated = $request->validate([
            'nama_modul' => 'required|string|max:255'
        ]);

        $url = $request->url;
        $publish = $request->publish;
        $aktif = $request->aktif;
        $status = $request->status;

        $updateData = [
            'nama_modul' => $validated['nama_modul'],
            'url' => $url,
            'publish' => $publish,
            'aktif' => $publish,
            'aktif' => $aktif,
            'status' => $status,
            'link_seo' => Str::slug($validated['nama_modul']),
        ];

        $manajemenmodul->update($updateData);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.manajemenmodul.index')->with('success', 'Banner slider berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $manajemenmodul = Manajemenmodul::findOrFail($id);
        $manajemenmodul->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.manajemenmodul.index')->with('success', 'Banner slider berhasil dihapus');
    }
}
