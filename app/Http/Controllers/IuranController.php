<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Warga;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource with search.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $status = $request->input('status');

        $iurans = Iuran::with('warga')
            ->when($search, function ($query, $search) {
                return $query->whereHas('warga', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                });
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->where('bulan', $bulan);
            })
            ->when($tahun, function ($query, $tahun) {
                return $query->where('tahun', $tahun);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('tahun', 'desc')
            ->orderBy('bulan', 'desc')
            ->paginate(10)
            ->withQueryString();

        $wargas = Warga::where('status', 'aktif')->orderBy('nama')->get();

        return view('iuran.index', compact('iurans', 'search', 'bulan', 'tahun', 'status', 'wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wargas = Warga::where('status', 'aktif')->orderBy('nama')->get();
        return view('iuran.create', compact('wargas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2030',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_bayar' => 'nullable|date',
            'status' => 'required|in:lunas,belum_lunas',
            'keterangan' => 'nullable|string',
        ]);

        // Check if iuran already exists for this warga, bulan, and tahun
        $exists = Iuran::where('warga_id', $validated['warga_id'])
            ->where('bulan', $validated['bulan'])
            ->where('tahun', $validated['tahun'])
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data iuran untuk warga ini pada bulan dan tahun tersebut sudah ada!');
        }

        Iuran::create($validated);

        return redirect()->route('iuran.index')
            ->with('success', 'Data iuran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Iuran $iuran)
    {
        $iuran->load('warga');
        return view('iuran.show', compact('iuran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iuran $iuran)
    {
        $wargas = Warga::where('status', 'aktif')->orderBy('nama')->get();
        return view('iuran.edit', compact('iuran', 'wargas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iuran $iuran)
    {
        $validated = $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2020|max:2030',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_bayar' => 'nullable|date',
            'status' => 'required|in:lunas,belum_lunas',
            'keterangan' => 'nullable|string',
        ]);

        // Check if iuran already exists for this warga, bulan, and tahun (excluding current record)
        $exists = Iuran::where('warga_id', $validated['warga_id'])
            ->where('bulan', $validated['bulan'])
            ->where('tahun', $validated['tahun'])
            ->where('id', '!=', $iuran->id)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data iuran untuk warga ini pada bulan dan tahun tersebut sudah ada!');
        }

        $iuran->update($validated);

        return redirect()->route('iuran.index')
            ->with('success', 'Data iuran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iuran $iuran)
    {
        $iuran->delete();

        return redirect()->route('iuran.index')
            ->with('success', 'Data iuran berhasil dihapus!');
    }
}
