<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    #追加してください。
use \App\GachaStyle;
use App\Talk;

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
    $talk_list = Talk::get();
    $result = mt_rand(0, count($talk_list)-1);
    $talk_id = $talk_list[$result]['id'];
    $user = Auth::user();
    dd($user);
    //return view('gacha.index');
  }




}
