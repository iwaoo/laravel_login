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
  public function show(Request $request, $id)
  {

    $item = GachaStyle::find($id);
    $gacha_style_id = $id;
    return view('gacha.show', compact('item', 'gacha_style_id'));
  }
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index($gacha_style_id)
  {
    dd($gacha_style_id);
    //return view('gacha.index');
  }




}
