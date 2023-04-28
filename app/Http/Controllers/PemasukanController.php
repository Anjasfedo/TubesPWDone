<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        return view('pemasukan.index');
    }

    public function data(){
        $pemasukan = Pemasukan::orderBy('id_pemasukan', 'desc')->get();

    return datatables()
        ->of($pemasukan)
        ->addIndexColumn()
        ->addColumn('created_at', function ($pemasukan) {
            return tanggal_indonesia($pemasukan->created_at, false);
        })
        ->addColumn('nominal', function ($pemasukan) {
            return format_uang($pemasukan->nominal);
        })
        ->addColumn('aksi', function ($pemasukan) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('pemasukan.update', $pemasukan->id_pemasukan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('pemasukan.destroy', $pemasukan->id_pemasukan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'select_all'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $pemasukan = Pemasukan::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $pemasukan = Pemasukan::find($id);

        return response()->json($pemasukan);
    }

    public function update(Request $request, string $id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();

        return response(null, 204);
    }
}
