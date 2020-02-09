<?php

namespace App\Http\Controllers;



class GachaDrawingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function create()
    {
        return view('gacha_drawing.create');
    }

    public function store()
    {
        $data = request()->validate([
            'a_word' => 'required',
            'description' => 'required',
            'image' => ['required', 'image'],
        ]);

        dd(request('image')->store('uploads', 'public'));

        //auth()->user()->drawings()->create($data);

        //dd(request()->all());
    }


}
