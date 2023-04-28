<?php

namespace App\Http\Controllers;

use App\Models\GajiKaryawan;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class GajiKaryawanController extends Controller
{
    public function index()
    {
        $karyawan = karyawan::all()->pluck('nama_karyawan', 'id_karyawan');

        return view('gaji_karyawan.index', compact('karyawan'));
    }

    public function data(){
        $gaji_karyawan = Gajikaryawan::leftJoin('karyawan', 'karyawan.id_karyawan', 'gaji_karyawan.id_karyawan')
        ->select('gaji_karyawan.*', 'nama_karyawan')
        ->get();

    return datatables()
        ->of($gaji_karyawan)
        ->addIndexColumn()
        ->addColumn('created_at', function ($gaji_karyawan) {
            return tanggal_indonesia($gaji_karyawan->created_at, false);
        })
        ->addColumn('nominal', function ($gaji_karyawan) {
            return format_uang($gaji_karyawan->nominal);
        })
        ->addColumn('aksi', function ($gaji_karyawan) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('gaji_karyawan.update', $gaji_karyawan->id_gaji_karyawan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('gaji_karyawan.destroy', $gaji_karyawan->id_gaji_karyawan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'select_all'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $gaji_karyawan = GajiKaryawan::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $gaji_karyawan = GajiKaryawan::find($id);

        return response()->json($gaji_karyawan);
    }

    public function update(Request $request, string $id)
    {
        $gaji_karyawan = GajiKaryawan::find($id);
        $gaji_karyawan->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $gaji_karyawan = GajiKaryawan::find($id);
        $gaji_karyawan->delete();

        return response(null, 204);
    }
}
