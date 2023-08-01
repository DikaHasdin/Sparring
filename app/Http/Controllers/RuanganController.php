<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        //get all ruangans from Models
        $ruangans = Ruangan::latest()->get();

        //return view with data
        return view('ruangans.index', compact('ruangans'));
    }
}
