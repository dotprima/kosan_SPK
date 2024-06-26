<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Kosan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::orderby('id', 'asc')->get();
        $alternatif = Alternatif::with('kosan')->orderby('created_at', 'desc')->get();
        return view('admin.alternatif.index', compact('kriteria', 'alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get the ids of kosans that are already associated with an alternatif
        $usedKosanIds = Alternatif::pluck('kosan_id');
        // Get all kosans except those already associated
        $kosans = Kosan::whereNotIn('id', $usedKosanIds)->get();
        
        return view('admin.alternatif.create', compact('kosans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kosan_id' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
            'C6' => 'required',
            'C7' => 'required',
            'C8' => 'required',
            'C9' => 'required',
        ]);

        $alternatif = Alternatif::create([
            'kosan_id' => $request->kosan_id,
            'C1' => $request->C1,
            'C2' => $request->C2,
            'C3' => $request->C3,
            'C4' => $request->C4,
            'C5' => $request->C5,
            'C6' => $request->C6,
            'C7' => $request->C7,
            'C8' => $request->C8,
            'C9' => $request->C9,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        // Get the ids of kosans that are already associated with an alternatif, except for the current one
        $usedKosanIds = Alternatif::where('id', '!=', $alternatif->id)->pluck('kosan_id');
        // Get all kosans except those already associated, or include the current one
        $kosans = Kosan::whereNotIn('id', $usedKosanIds)->orWhere('id', $alternatif->kosan_id)->get();

        return view('admin.alternatif.edit', compact('alternatif', 'kosans'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kosan_id' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
            'C6' => 'required',
            'C7' => 'required',
            'C8' => 'required',
            'C9' => 'required',
        ]);

        $alternatif = [
            'kosan_id' => $request->kosan_id,
            'C1' => $request->C1,
            'C2' => $request->C2,
            'C3' => $request->C3,
            'C4' => $request->C4,
            'C5' => $request->C5,
            'C6' => $request->C6,
            'C7' => $request->C7,
            'C8' => $request->C8,
            'C9' => $request->C9,
        ];

        Alternatif::whereId($id)->update($alternatif);

        return redirect()->route('alternatif.index')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::findorfail($id);
        $alternatif->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
