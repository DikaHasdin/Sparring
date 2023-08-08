<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    public function index()
    {
        //get all ruangans from Models
        $ruangans = Ruangan::latest()->get();

        //return view with data
        return view('ruangans.index3', compact('ruangans'));
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_ruangan'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create Ruangan
        $Ruangan = Ruangan::create([
            'nama_ruangan'     => $request->nama_ruangan, 
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $Ruangan  
        ]);
    }

    public function show(Ruangan $ruangan)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Ruangan',
            'data'    => $ruangan  
        ]); 
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_ruangan'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create ruangan
        $ruangan->update([
            'nama_ruangan'     => $request->nama_ruangan, 
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $ruangan  
        ]);
    }

    public function destroy($id)
    {
        //delete Ruangan by ID
        Ruangan::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Ruangan Berhasil Dihapus!.',
        ]); 
    }
} 
