<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    function landingpage()
    {
        $pageTitle = 'About';

        return view('User.about', ['pageTitle' => $pageTitle]);
    }
    function about()
    {
        $pageTitle = 'LandingPage';

        return view('User.landingpage', ['pageTitle' => $pageTitle]);
    }
    function pengajuan()
    {
        $pageTitle = 'Pengajuan';

        return view('User.pengajuan', ['pageTitle' => $pageTitle]);
    }
    function jadwal()
    {
        $pageTitle = 'Jadwal';

        return view('User.Jadwal', ['pageTitle' => $pageTitle]);
    }
}
