<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Yangilik;
use App\Models\Hodimlar;
use App\Models\Maqola;
use App\Models\Fan;

class AsosiyController extends Controller
{
    public function index()
    {
        $yangilik = Yangilik::all();
        return view('asosiy.index', compact('yangilik'));
    }

    public function shown(Request $request)
    {
        $yangilik = Yangilik::where('id', $request->id)->first();
        return view('asosiy.showyangilik', compact('yangilik'));
    }

    public function home(Request $request)
    {
        if ($request->name === 'home') {
            $yangilik = Yangilik::all();
            return view('asosiy.index', compact('yangilik'));
        } else if ($request->name === 'xodim') {
            $hodim = Hodimlar::all();
            return view('asosiy.hodim.hodimindex', compact('hodim'));
        } else if ($request->name === 'fan') {
            $fan = Fan::all();
            return view('asosiy.fan.fanindex', compact('fan'));
        }
    }

    public function showxodim(Request $request)
    {
        $xodim = Hodimlar::where('id', $request->xodim)->first();
        //$maqola = Maqola::where('user_id', $request->xodim)->first();
        return view('asosiy.hodim.hodimshow', compact('xodim'));
    }
}
