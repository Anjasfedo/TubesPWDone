<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index');
    }

    public function data(){
        $karyawan = Karyawan::orderBy('kode_karyawan')->get();

    return datatables()
        ->of($karyawan)
        ->addIndexColumn()
        ->addColumn('select_all', function ($karyawan) {
            return '
                <input type="checkbox" name="id_karyawan[]" value="'. $karyawan->id_karyawan .'">
            ';
        })
        ->addColumn('kode_karyawan', function ($karyawan) {
            return '<span class="label label-success">'. $karyawan->kode_karyawan .'<span>';
        })
        ->addColumn('aksi', function ($karyawan) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('karyawan.update', $karyawan->id_karyawan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('karyawan.destroy', $karyawan->id_karyawan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'select_all', 'kode_karyawan'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::latest()->first() ?? new Karyawan();
        $kode_karyawan = (int) $karyawan->kode_karyawan +1;

        $karyawan = new Karyawan();
        $karyawan->kode_karyawan = tambah_nol_didepan($kode_karyawan, 5);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->telepon = $request->telepon;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $karyawan = karyawan::find($id);

        return response()->json($karyawan);
    }

    public function update(Request $request, string $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_karyawan as $id) {
            $karyawan = Karyawan::find($id);
            $karyawan->delete();
        }

        return response(null, 204);
    }
}
