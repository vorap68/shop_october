<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)

    {
        dump($_GET);
       print_r($_GET);
        dump('0000');
        echo 'answer'.$request->input('text');
       // dd($request->all());
    }
}
