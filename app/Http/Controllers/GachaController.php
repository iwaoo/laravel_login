<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    #追加してください。
use \App\GachaStyle;
use App\Talk;
use App\UserTalk;

class GachaController extends Controller
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
   public function index($gacha_style_id, $hit_flg=false)
   {
     $talk_list = Talk::get();
     $rand_result = mt_rand(0, count($talk_list)-1);
     $talk_id = $talk_list[$rand_result]['id'];
     $talk_result = $talk_list[$rand_result];
     $gacha_style_result = GachaStyle::find($gacha_style_id);
     $user = Auth::user();
     $user_id = $user->id;

     $rand1 = mt_rand(0, 9);
     $rand2 = mt_rand(0, 9);
     if ($rand1 == $rand2) {
       $hit_flg = true;
     }

     // OaklandからSan Diego行きの飛行機があれば、料金へ９９ドルを設定する。
     // 一致するモデルがなければ、作成する。

     $create_user_talk = UserTalk::updateOrCreate(
       ['user_id' => $user_id, 'talk_id' => $talk_id],
       ['gacha_style_id' => $gacha_style_id, 'hit_flg' => $hit_flg]
     );


     $result['talk_result'] = $talk_result;
     $result['gacha_style_result'] = $gacha_style_result;
     $result['user'] = $user;

     dd($create_user_talk);

//     return view('gacha.index', compact('talk_result', 'gacha_style_result', 'user'));
   }




}
