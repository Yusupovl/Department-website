<?php

namespace App\Http\Controllers;

use App\Models\Hodimlar;
use Illuminate\Http\Request;
use App\Models\Maqola;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MaqolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::user()->id;
        // if ($id == 1) {
        //     $maqola = Maqola::all();
        //     return view('maqolalar.index', compact('maqola'));
        // }

        // $email = Auth::user()->email;
        // $hodim = Hodimlar::where('email', $email)->first();

        /*$maqola = Maqola::all();*/

        $maqola = Maqola::query();
        $user_id = Auth::id();
        if ($user_id === 1)
            $maqola = $maqola->get();
        else
            $maqola = $maqola->where('user_id', $user_id)->get();

        return view('maqolalar.index', compact('maqola'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maqolalar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomi' => 'required',
            'file' => 'required',
            'yili' => 'required',
            'turi' => 'required',
            'link' => 'nullable',
        ]);

        if ($request->hasFile('file')) {
            $filemodel = $request->file("file");
            $fileNameWithExt = $filemodel->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $filemodel->getClientOriginalExtension();
            $fileNameToStore = $filename . "_" . time() . "." . $ext;
            #Storage::disk('talaba')->put('', $filemodel, $fileNameToStore);
            $request->file("file")->storeAs("", $fileNameToStore, "talaba");
            #$path = $filemodel->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = "notfile.pdf";
        }

        $maqolalar = new Maqola();
        $maqolalar->user_id = auth()->user()->id;
        $maqolalar->nomi = $data['nomi'];
        $maqolalar->link = $data['link'];
        $maqolalar->yili = $data['yili'];
        $maqolalar->turi = $data['turi'];
        $maqolalar->file = $fileNameToStore;

        $maqolalar->save();

        return redirect()->route('maqolalar.index')->with('message', "Maqola ma'lumotlari o'zgartirildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maqola = Maqola::find($id);
        if ((Auth::id() === 1) || (Auth::id() !== 1 && Auth::id() === $maqola->user_id))
            return view('maqolalar.show', compact('maqola'));
        else return "Sizning maqolangiz emas";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maqola $maqolalar)
    {
        $maqola = $maqolalar;
        if (auth()->user()->id === $maqolalar->user_id) {
            return view('maqolalar.edit', compact('maqola'));
        } else {
            if (auth()->user()->id === 1) {
                $hlist = Hodimlar::with('user')->get()->pluck('familya', 'user.id');
                #$hlist = Hodimlar::with('user')->get();
                #dd($hlist);
                return view('maqolalar.edit', compact('maqola', 'hlist'));
            } else
                return "bu maqolani o'zgartirishga vakolatingiz yo'q";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maqola $maqolalar)
    {
        if (auth()->user()->id === 1) {
            $data = $request->validate([
                'hodim' => 'required',
                'nomi' => 'required',
                'file' => 'required',
                'yili' => 'required',
                'turi' => 'required',
                'link' => 'required',
            ]);
        } else {
            $data = $request->validate([
                'nomi' => 'required',
                'file' => 'required',
                'yili' => 'required',
                'turi' => 'required',
                'link' => 'required',
            ]);
        }


        if ($request->hasFile('file')) {
            $filemodel = $request->file("file");
            $fileNameWithExt = $filemodel->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $filemodel->getClientOriginalExtension();
            $fileNameToStore = $filename . "_" . time() . "." . $ext;
            #Storage::disk('talaba')->put('', $filemodel, $fileNameToStore);
            $request->file("file")->storeAs("", $fileNameToStore, "talaba");
            #$path = $filemodel->storeAs('public/images', $fileNameToStore);
        }
        if (auth()->user()->id !== 1)
            $maqolalar->user_id = auth()->user()->id;
        else {
            #$hodim = Hodimlar::find($data['hodim']);
            #$id = User::where('email', $hodim->email)->first()->id;
            $maqolalar->user_id = $data['hodim'];
        }
        $maqolalar->nomi = $data['nomi'];
        $maqolalar->link = $data['link'];
        $maqolalar->yili = $data['yili'];
        $maqolalar->turi = $data['turi'];
        $maqolalar->file = $fileNameToStore;

        $maqolalar->save();

        return redirect()->route('maqolalar.index')->with('message', "Maqola ma'lumotlari o'zgartirildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
