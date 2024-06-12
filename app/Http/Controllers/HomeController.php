<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Mobil;

class HomeController extends Controller
{

    public function index(){
        redirect()->route('dashboard.index');
    }
}
