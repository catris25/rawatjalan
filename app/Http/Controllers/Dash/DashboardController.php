<?php

  namespace App\Http\Controllers\Dash;

  use Illuminate\Http\Request;
     use App\Http\Controllers\Controller;

  class DashboardController extends Controller
  {
     public function home(Request $request)
     {
         return view('dashboard.home');
     }

     public function __construct()
     {
       $this->middleware('auth');
     }
  }

?>
