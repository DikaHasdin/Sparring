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
        return view('ruangans.index', compact('ruangans'));
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
} 
