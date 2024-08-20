<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $agendas = Agenda::latest()
                ->where('id_agenda', 'like', "%$search%")
                ->orWhere('tema', 'like', "%$search%")
                ->paginate(10);
        } else {
            $agendas = Agenda::orderBy('tgl_posting', 'desc')->paginate(10);
        }

        return view('administrator.agenda.index', compact('agendas'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
            'isi_agenda' => 'nullable|string',
            'tempat' => 'nullable|string',
            'jam' => ['required', 'regex:/^([01]\d|2[0-3]):([0-5]\d) - ([01]\d|2[0-3]):([0-5]\d) WIB$/'],
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'pengirim' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $tema = $request->tema;
        $jam = $request->jam;
        $jamMulaiSelesai = explode(' - ', $jam);
        $jamMulai = trim($jamMulaiSelesai[0]);
        $jamSelesai = trim($jamMulaiSelesai[1]);

        // Proses file gambar
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $tema."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move(public_path("foto_agenda/"), $gambarName);
        }

        $username = $request->username ?: 'admin';

        // Simpan data ke database
        Agenda::create([
            'tema' => $request->tema,
            'tema_seo' => Str::slug($request->tema),
            'isi_agenda' => $request->isi_agenda,
            'tempat' => $request->tempat,
            'gambar' => $gambarName,
            'jam' => $jam,
            'tgl_mulai' => $request->tgl_mulai, // Simpan dalam format YYYY-MM-DD
            'tgl_selesai' => $request->tgl_selesai, // Simpan dalam format YYYY-MM-DD
            'pengirim' => $request->pengirim,
            'tgl_posting' => now(),
            "username" => $username,
        ]);

        session()->flash("pesan", "Agenda berhasil Ditambah");
        return redirect()->route('administrator.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
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
    public function edit(string $id_agenda):View
    {
        //
        // dd($id_agenda);
        $agenda = Agenda::findOrFail($id_agenda);

        return view('administrator.agenda.edit', compact(['agenda']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_agenda)
    {
        //
        $validated = $request->validate([
            'isi_agenda' => 'required|string|max:255',
            'pengirim' => 'nullable|string|max:255',
            'tempat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dibaca' => 'nullable|integer'
        ]);

        $validated['dibaca'] = $validated['dibaca'] ?? 0;

        $agenda = Agenda::findOrFail($id_agenda);

        $tema = $request->tema;
        $username = $request->username ?: 'admin';

        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
        $tgl_posting = $request->tgl_posting;
        $jam = $request->jam;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $tema."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_agenda/", $gambarName);
            $agenda->gambar = $gambarName;
        }

        $agenda->update([
            "tema" => $tema,
            "isi_agenda" => $validated['isi_agenda'],
            "tempat" => $validated['tempat'],
            "gambar" => $gambarName,
            "jam" => $jam,
            "username" => $username,
            "tgl_mulai" => $tgl_mulai,
            "tgl_selesai" => $tgl_selesai,
            'tgl_posting' => now(),
            "dibaca" => $validated['dibaca'],
            "pengirim" => $validated['pengirim']
        ]);

        session()->flash("pesan", "Agenda berhasil Diperbarui");
        return redirect()->route('administrator.agenda.index')->with(['success' => 'Agenda berhasil Diperbarui']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_agenda):RedirectResponse
    {
        //
        $agenda = Agenda::findOrFail($id_agenda);
        $agenda->delete();

        session()->flash("pesan", "Agenda berhasil Dihapus");
        return redirect()->route('administrator.agenda.index')->with(['success'=>'Agenda berhasil Dihapus']);
    }
}
