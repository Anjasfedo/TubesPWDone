<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index');
    }

    public function data(){
        $member = Member::orderBy('kode_member')->get();

    return datatables()
        ->of($member)
        ->addIndexColumn()
        ->addColumn('select_all', function ($member) {
            return '
                <input type="checkbox" name="id_member[]" value="'. $member->id_member .'">
            ';
        })
        ->addColumn('kode_member', function ($member) {
            return '<span class="label label-success">'. $member->kode_member .'<span>';
        })
        ->addColumn('aksi', function ($member) {
            return '
            <div class="btn-group">
                <button type="button" onclick="editForm(`'. route('member.update', $member->id_member) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                <button type="button" onclick="deleteData(`'. route('member.destroy', $member->id_member) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi', 'select_all', 'kode_member'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $member = Member::latest()->first() ?? new Member();
        $kode_member = (int) $member->kode_member +1;

        $member = new Member();
        $member->kode_member = 'Member'.tambah_nol_didepan($kode_member, 5);
        $member->nama_member = $request->nama_member;
        $member->telepon = $request->telepon;
        $member->alamat = $request->alamat;
        $member->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show(string $id)
    {
        $member = Member::find($id);

        return response()->json($member);
    }

    public function update(Request $request, string $id)
    {
        $member = Member::find($id);
        $member->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    public function destroy(string $id)
    {
        $member = Member::find($id);
        $member->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id_member as $id) {
            $member = Member::find($id);
            $member->delete();
        }

        return response(null, 204);
    }
}