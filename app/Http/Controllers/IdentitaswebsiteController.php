<?php

namespace App\Http\Controllers;

use App\Models\Identitaswebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class IdentitaswebsiteController extends Controller
{
    /**
     * Menampilkan form edit identitas website.
     */
    public function edit(): View
    {
        $identitaswebsite = Identitaswebsite::first();
        return view('administrator.identitaswebsite.edit', compact('identitaswebsite'));
    }

    /**
     * Update identitas website.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "nama_website" => 'required|string|max:255',
            "email" => 'required|email',
            "url" => 'required|url',
            "facebook" => 'required|url',
            "rekening" => 'required',
            "no_telp" => 'required',
            "meta_deskripsi" => 'required',
            "meta_keyword" => 'required',
            "maps" => 'required|url',
            "favicon" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $identitaswebsite = Identitaswebsite::first();

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = $request->nama_website . "_" . Str::random(25) . "." . $favicon->getClientOriginalExtension();
            $favicon->move('./foto_identitas', $faviconName);
            
            // Hapus favicon lama jika ada
            if ($identitaswebsite->favicon) {
                Storage::delete('./foto_identitas/' . $identitaswebsite->favicon);
            }
            
            $identitaswebsite->favicon = $faviconName;
        }

        $identitaswebsite->update($validated);

        return redirect()->route("administrator.identitaswebsite.edit")->with('success', 'Data berhasil diperbarui');
    }
}