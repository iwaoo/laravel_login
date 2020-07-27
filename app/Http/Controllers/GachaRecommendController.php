<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\GachaStyle;

class GachaRecommendController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {

    $GachaStyles = GachaStyle::select('id', 'recommend_flg')->get();
    //dd($ids);

    return view('gacha_recommend.index', compact('GachaStyles'));

  }

  public function update()
  {
        if(isset($_POST['id'])){
             if (is_array($_POST['id'])) {
                  foreach($_POST['id'] as $id){


                     $GachaStyle = GachaStyle::where('id', $id)->first();
                     $GachaStyle->recommend_flg = false;
                     $GachaStyle->save();


                  }
            }
        }
  }

}
