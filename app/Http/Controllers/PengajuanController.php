<?php

namespace App\Http\Controllers;

class PengajuanController extends Controller
{
    public function landingpage()
    {
        $pageTitle = 'About';

        return view('User.about', ['pageTitle' => $pageTitle]);
    }

    public function about()
    {
        $pageTitle = 'LandingPage';

        return view('User.landingpage', ['pageTitle' => $pageTitle]);
    }

    public function pengajuan()
    {
        $pageTitle = 'Pengajuan';

        return view('User.pengajuan', ['pageTitle' => $pageTitle]);
    }

    public function jadwal()
    {
        $pageTitle = 'Jadwal';

        return view('User.Jadwal', ['pageTitle' => $pageTitle]);
    }
}
