<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kosan;

class KosanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kosans = Kosan::orderby('created_at', 'desc')->get();
        return view('admin.kosan.index', compact('kosans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kosan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        Kosan::create($request->all());

        return redirect()->route('kosan.index')->with('success', 'Data kosan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kosan  $kosan
     * @return \Illuminate\Http\Response
     */
    public function show(Kosan $kosan)
    {
        return view('admin.kosan.show', compact('kosan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kosan  $kosan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kosan $kosan)
    {
        return view('admin.kosan.edit', compact('kosan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kosan  $kosan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kosan $kosan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $kosan->update($request->all());

        return redirect()->route('kosan.index')->with('success', 'Data kosan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kosan  $kosan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kosan $kosan)
    {
        $kosan->delete();

        return redirect()->route('kosan.index')->with('success', 'Data kosan berhasil dihapus');
    }
}