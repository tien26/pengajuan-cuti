<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('hrd')) {
            $data = ['role' => 'HRD'];
        } else {
            $data = ['role' => 'KARYAWAN'];
        }
        return view('dashboard', $data);
    }
}
