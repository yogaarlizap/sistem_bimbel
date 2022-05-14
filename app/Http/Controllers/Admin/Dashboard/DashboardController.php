<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get()->count();
        $pengajar = Pengajar::get()->count();
        return view('dashboard/index', compact('siswa', 'pengajar'));
    }
}
