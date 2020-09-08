<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\GachaStyle;

class GachaListController extends Controller
{
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

    $ids = GachaStyle::select('id')->get();
    //dd($ids);

      return view('gacha_list.index', compact('ids'));

  }

}
