<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        return view('jenis.index');
    }

    public function data(){
        $jenis = Jenis::orderBy('id_jenis', 'desc')->get();

        return datatables()
            ->of($jenis)
            ->addIndexColumn()
            ->addColumn('aksi', function ($jenis) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('jenis.update', $jenis->id_jenis) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('jenis.destroy', $jenis->id_jenis) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $jenis = new Jenis();
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $jenis = Jenis::find($id);

        return response()->json($jenis);
    }

    public function update(Request $request, string $id)
    {
        $jenis = Jenis::find($id);
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $jenis = Jenis::find($id);
        $jenis->delete();

        return response(null, 204);
    }
}
