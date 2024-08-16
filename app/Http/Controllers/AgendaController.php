<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
            $agendas = Agenda::orderBy('id_agenda', 'desc')->paginate(10);
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
