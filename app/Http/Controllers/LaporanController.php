<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function jurnal_umum(): View
    {  
        $jurnal_umum = Jurnal::latest()->paginate(5);
        return view('laporan.jurnal_umum', compact('jurnal_umum'));
    }
}
