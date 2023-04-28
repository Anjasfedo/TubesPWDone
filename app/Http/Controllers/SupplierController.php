<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index');
    }

    public function data(){
        $supplier = Supplier::orderBy('id_supplier', 'desc')->get();

    return datatables()
        ->of($supplier)
        ->addIndexColumn()
        ->addColumn('select_all', function ($supplier) {
            return '
                <input type="checkbox" name="id_supplier[]" value="'. $supplier->id_supplier .'">
            ';
        })
        ->addColumn('aksi', function ($supplier) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('supplier.update', $supplier->id_supplier) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('supplier.destroy', $supplier->id_supplier) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'select_all'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $supplier = Supplier::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $supplier = Supplier::find($id);

        return response()->json($supplier);
    }

    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_supplier as $id) {
            $supplier = Supplier::find($id);
            $supplier->delete();
        }

        return response(null, 204);
    }
}
