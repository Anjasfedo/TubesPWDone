<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use App\Models\Jenis;

class BahanController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all()->pluck('nama_jenis', 'id_jenis');

        return view('bahan.index', compact('jenis'));
    }

    public function data(){
        $bahan = Bahan::leftJoin('jenis', 'jenis.id_jenis', 'bahan.id_jenis')
        ->select('bahan.*', 'nama_jenis')
        ->get();

    return datatables()
        ->of($bahan)
        ->addIndexColumn()
        ->addColumn('select_all', function ($bahan) {
            return '
                <input type="checkbox" name="id_bahan[]" value="'. $bahan->id_bahan .'">
            ';
        })
        ->addColumn('kode_bahan', function ($bahan) {
            return '<span class="label label-success">'. $bahan->kode_bahan .'</span>';
        })
        ->addColumn('harga_beli', function ($bahan) {
            return format_uang($bahan->harga_beli);
        })
        ->addColumn('stok', function ($produk) {
            return format_uang($produk->stok);
        })
        ->addColumn('aksi', function ($bahan) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('bahan.update', $bahan->id_bahan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('bahan.destroy', $bahan->id_bahan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'select_all', 'kode_bahan'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $bahan = Bahan::latest()->first() ?? new bahan();
        $request['kode_bahan'] = 'Bahan'. tambah_nol_didepan((int)$bahan->id_bahan +1, 6);

        $bahan = Bahan::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $bahan = Bahan::find($id);

        return response()->json($bahan);
    }

    public function update(Request $request, string $id)
    {
        $bahan = Bahan::find($id);
        $bahan->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $bahan = Bahan::find($id);
        $bahan->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_bahan as $id) {
            $bahan = Bahan::find($id);
            $bahan->delete();
        }

        return response(null, 204);
    }
}