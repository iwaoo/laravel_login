<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\GachaStyle;

class GachaController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function show($id)
  {

    $item = GachaStyle::find($id);

    //dd($item);

      return view('gacha.show', compact('item'));

  }
}
