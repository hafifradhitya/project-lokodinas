<?php

namespace App\Http\Controllers;

use App\Models\Playlistvideo;
use App\Models\Tag;
use App\Models\Tagvideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if(!empty($search)) {
            $videos = Video::with('playlist')
            ->where('jdl_video', 'like', "%$search%")
            ->paginate(10);
        } else {
            $videos = Video::with('playlist')->orderBy('tanggal', 'desc')->paginate(10);
        }

        return view('administrator.video.index', compact(['videos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        $playlistvideos = Playlistvideo::all();
        $tagvids = Tagvideo::orderBy('nama_tag', 'desc')->get();

        return view('administrator.video.create', compact(['playlistvideos', 'tagvids']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        // dd($request);
        $validated = $request->validate([
            'jdl_video' => 'required|string|max:255',
            'id_playlist' => 'required|exists:playlist,id_playlist', // Tambahkan validasi untuk kategori
            'keterangan' => 'required|string|max:255',
            'gbr_video' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube' => 'required|url|max:255'
        ]);

        $jdl_video = $request->jdl_video;
        $gambarName = null;

        $username = $request->username ?: 'admin';

        if($request->hasFIle('gbr_video')) {
            $gbr_video = $request->file("gbr_video");
            $gambarName = $jdl_video.".".Str::random(25).".".$gbr_video->getClientOriginalExtension();
        }

        if ($request->tagvid !=''){
            $tag_seo = $request->tagvid;
            $tagvid=implode(',',$tag_seo);
        }else{
            $tagvid = '';
        }

        Video::create([
            "jdl_video" => $jdl_video,
            "video_seo" => Str::slug($validated['jdl_video']),
            "id_playlist" => $validated['id_playlist'],
            "gbr_video" => $gambarName,
            "keterangan" => $validated['keterangan'],
            "youtube" => $validated['youtube'],
            "video" => '',
            "tagvid" => $tagvid,
            "username" => $username,
            "tanggal" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.video.index')->with(['succes'=>'Data berhasil Ditambah']);
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
    public function edit(string $id_video):View
    {
        //
        $videos = Video::findOrFail($id_video);
        $playlistvideos = Playlistvideo::all();
        $tagvids = Tagvideo::all();
        return view('administrator.video.edit', compact(['videos', 'playlistvideos', 'tagvids']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_video)
    {
        //
        $validated = $request->validate([
            'jdl_video' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'gbr_video' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube' => 'required|url|max:255',
        ]);

        $videos = Video::findOrFail($id_video);

        $jdl_video = $request->jdl_video;
        $gambarName = null;

        $username = $request->username ?: 'admin';

        if ($request->tagvid !=''){
            $tag_seo = $request->tagvid;
            $tagvid=implode(',',$tag_seo);
        }else{
            $tagvid = '';
        }

        if($request->hasFIle('gbr_video')) {
            $gbr_video = $request->file("gbr_video");
            $gambarName = $jdl_video.".".Str::random(25).".".$gbr_video->getClientOriginalExtension();
        }

        $videos->update([
            "jdl_video" => $jdl_video,
            "video_seo" => Str::slug($validated['jdl_video']),
            "gbr_video" => $gambarName,
            "tagvid" => $tagvid,
            "youtube" => $validated['youtube'],
            "keterangan" => $validated['keterangan'],
            "username" => $username,
        ]);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.video.index')->with(['success' => 'Data berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_video):RedirectResponse
    {
        //
        $videos = Video::findOrFail($id_video);
        $videos->delete();

         session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.video.index')->with(['success'=>'Data berhasil Dihapus']);
    }
}
