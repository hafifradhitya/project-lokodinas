<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Berita;
use App\Models\Tag;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $berita = Berita::latest()
                ->where('judul', 'like', "%$search%")
                ->orWhere('isi_berita', 'like', "%$search%")
                ->paginate(10);
        } else {
            $berita = Berita::orderBy('tanggal', 'desc')->paginate(10);
        }

        return view('administrator.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        $kategori = Kategori::all();

        $tags = Tag::all();
        return view('administrator.berita.create', compact(['kategori', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'nullable|string|max:255',
            'youtube' => 'nullable|url|max:255',
            'headline' => 'nullable|boolean',
            'aktif' => 'nullable|boolean',
            'utama' => 'nullable|boolean',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id_tag',
            'isi_berita' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_berita/", $gambarName);
        }

        $username = $request->username ?: 'admin';

        Berita::create([
            "judul" => $judul,
            "sub_judul" => $request->sub_judul,
            "youtube" => $request->youtube,
            "judul_seo" => Str::slug($validated['judul']),
            "headline" => $request->headline ?? 0,
            "aktif" => $request->aktif ?? 'Y',
            "utama" => $request->utama ?? 0,
            "id_kategori" => $request->id_kategori,
            "isi_berita" => $request->isi_berita,
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username,
            "gambar" => $gambarName
        ]);

        session()->flash("pesan", "Berita berhasil Ditambah");
        return redirect()->route('administrator.berita.index')->with(['success'=>'Berita berhasil Ditambah']);
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
    public function edit(string $id_berita):View
    {
        $kategori = Kategori::all();
        $tags = Tag::all();

        $berita = Berita::where('id_berita', $id_berita)->firstOrFail();

        return view('administrator.berita.edit', compact('berita', 'kategori', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_berita):RedirectResponse
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'nullable|string|max:255',
            'youtube' => 'nullable|url|max:255',
            'headline' => 'nullable|boolean',
            'aktif' => 'nullable|boolean',
            'utama' => 'nullable|boolean',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id_tag',
            'isi_berita' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $berita = Berita::findOrFail($id_berita);

        $judul = $request->judul;
        $username = $request->username ?: 'admin';

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_berita/", $gambarName);
            $berita->gambar = $gambarName;
        }

        $berita->update([
            "judul" => $judul,
            "sub_judul" => $request->sub_judul,
            "youtube" => $request->youtube,
            "judul_seo" => Str::slug($validated['judul']),
            "headline" => $request->headline ?? 0,
            "aktif" => $request->aktif ?? 'Y',
            "utama" => $request->utama ?? 0,
            "id_kategori" => $request->id_kategori,
            "isi_berita" => $request->isi_berita,
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username
        ]);

        if ($request->has('tags')) {
            $berita->tags()->sync($request->tags);
        }

        session()->flash("pesan", "Berita berhasil Diperbarui");
        return redirect()->route('administrator.berita.index')->with(['success' => 'Berita berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_berita):RedirectResponse
    {
        //
        $berita = Berita::findOrFail($id_berita);

        // Hapus gambar terkait jika ada
        if ($berita->gambar && file_exists("./foto_berita/" . $berita->gambar)) {
            unlink("./foto_berita/" . $berita->gambar);
        }

        // Hapus relasi dengan tags
        $berita->tags()->detach();

        $berita->delete();

        session()->flash("pesan", "Berita berhasil Dihapus");
        return redirect()->route('administrator.berita.index')->with(['success'=>'Berita berhasil Dihapus']);
    }
}
