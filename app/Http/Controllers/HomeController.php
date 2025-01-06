<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return redirect()->route('index');
        }elseif(Auth::user()->role == 'Supplier') {
            return redirect()->route('supplier.dashboard');
        }elseif(Auth::user()->role == 'Pegawai'){
            return redirect()->route('pegawai.index');
        }
    }
}
