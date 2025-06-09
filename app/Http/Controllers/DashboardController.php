<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personel;

class DashboardController extends Controller
{
    public function index()
    {
        $personels = Personel::all();
        return view('dashboard', compact('personels'));
    }
}
