<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource (dengan pencarian).
     */
    public function index(Request $request)
    {
        // Mulai query
        $query = Spot::query();

        // Jika ada pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            $query->where('nama_spot', 'LIKE', "%$search%")
                  ->orWhere('alamat', 'LIKE', "%$search%")
                  ->orWhere('jenis_ikan', 'LIKE', "%$search%")
                  ->orWhere('deskripsi', 'LIKE', "%$search%");
        }

        $spots = $query->get();

        return view('spots.index', compact('spots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        




        // Validasi input
        $request->validate([
            'nama_spot'   => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'alamat'      => 'nullable|string',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
            'jenis_ikan'  => 'nullable|string|max:255',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:20048',
        ]);

        $fotoPath = null;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('spots', 'public');
        }

        // Simpan data ke database
        Spot::create([
            'nama_spot'  => $request->nama_spot,
            'deskripsi'  => $request->deskripsi,
            'alamat'     => $request->alamat,
            'latitude'   => $request->latitude,
            'longitude'  => $request->longitude,
            'jenis_ikan' => $request->jenis_ikan,
            'foto'       => $fotoPath,
        ]);

        return redirect()->route('spots.index')->with('success', 'Spot berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spot $spot)
    {
        return view('spots.show', compact('spot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spot $spot)
    {
        return view('spots.edit', compact('spot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        $request->validate([
            'nama_spot'   => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'alamat'      => 'nullable|string',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
            'jenis_ikan'  => 'nullable|string|max:255',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:20048',
        ]);

        $fotoPath = $spot->foto;

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('spots', 'public');
        }

        // Update data
        $spot->update([
            'nama_spot'  => $request->nama_spot,
            'deskripsi'  => $request->deskripsi,
            'alamat'     => $request->alamat,
            'latitude'   => $request->latitude,
            'longitude'  => $request->longitude,
            'jenis_ikan' => $request->jenis_ikan,
            'foto'       => $fotoPath,
        ]);

        return redirect()->route('spots.index')->with('success', 'Spot berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spot $spot)
    {
        $spot->delete();

        return redirect()->route('spots.index')->with('success', 'Spot berhasil dihapus!');
    }
}
