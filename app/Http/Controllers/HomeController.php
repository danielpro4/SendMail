<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gets all messages scheduled
        $schedules = Schedule::with('message')->paginate(50);

        return view('home')->with('schedules', $schedules);
    }
}
