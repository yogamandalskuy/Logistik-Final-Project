<?php

namespace App\Http\Controllers;

class JadwalController extends Controller
{
    public function about()
    {
        $pageTitle = 'About';

        return view('User.about', ['pageTitle' => $pageTitle]);
    }

    public function landingpage()
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

    public function showBorrowers()
    {
        $borrowers = Borrower::all();

        return view('User.jadwal ', compact('borrowers'));
    }
}
