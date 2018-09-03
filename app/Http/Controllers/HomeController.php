<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function privacy(Request $request)
    {
        // adword parameters
        $keyword = $request->keyword;
        $matchtype = $request->matchtype;
        $creative = $request->creative;
        $gclid = $request->gclid;


        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];

        return view('privacy', compact('parameters'));
    }

    public function dmca(Request $request)
    {
        // adword parameters
        $keyword = $request->keyword;
        $matchtype = $request->matchtype;
        $creative = $request->creative;
        $gclid = $request->gclid;


        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];

        return view('dmca', compact('parameters'));
    }

    public function aboutus(Request $request)
    {
        // adword parameters
        $keyword = $request->keyword;
        $matchtype = $request->matchtype;
        $creative = $request->creative;
        $gclid = $request->gclid;


        $parameters = [
            'keyword' => $keyword,
            'matchtype' => $matchtype,
            'creative' => $creative,
            'gclid' => $gclid,
        ];

        return view('aboutus', compact('parameters'));
    }
}
