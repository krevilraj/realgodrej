<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Phone;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
      return view('backend.Dashboard.dashboard');
    }
}
