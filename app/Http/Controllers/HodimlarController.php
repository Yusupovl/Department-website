<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hodimlar;

class HodimlarController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('showh', 'edit', 'update');
        //, 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id === 1) {
            $hodim = Hodimlar::all();
            return view('hodimlar.index', compact('hodim'));
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hodimlar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //saqlash
        $data = $request->validate([
            'ism' => 'required',
            'familya' => 'required',
            'sharif' => 'required',
            'upload_image' => 'image|nullable|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'lavozim' => 'required',
            'xona_nomer' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'tel_raqam' => 'required',
            'tarjimai_hol' => 'required'
        ]);

        if ($request->hasFile('upload_image')) {
            $filemodel = $request->file("upload_image");
            $fileNameWithExt = $filemodel->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $filemodel->getClientOriginalExtension();
            $fileNameToStore = $filename . "_" . time() . "." . $ext;
            #Storage::disk('talaba')->put('', $filemodel, $fileNameToStore);
            $request->file("upload_image")->storeAs("", $fileNameToStore, "talaba");
            #$path = $filemodel->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        $hodim = new Hodimlar();
        $hodim->ism = $data['ism'];
        $hodim->familya = $data['familya'];
        $hodim->sharif = $data['sharif'];
        $hodim->rasm = $fileNameToStore;
        $hodim->lavozim = $data['lavozim'];
        $hodim->email = $data['email'];
        $hodim->xona_nomer = $data['xona_nomer'];
        $hodim->tel_raqam = $data['tel_raqam'];
        $hodim->tarjimai_hol = $data['tarjimai_hol'];
        $hodim->save();



        return redirect()->route('hodimlar.index')->with('message', "Yangi hodim qo'shildi");

        //return redirect()->route('hodimlar.index')->with('message', "Yangi hodim qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hodimlar $hodimlar)
    {
        $hodim = $hodimlar;
        return view('hodimlar.show', compact('hodim'));
    }

    public function showh()
    {
        if (auth()->user()->id !== 1) {
            $hodim = Hodimlar::where('email', auth()->user()->email)->first();
            return view('hodimlar.show', compact('hodim'));
        } else {
            return "xato";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hodimlar $hodimlar)
    {
        $me = Hodimlar::query();
        if (auth()->user()->id !== 1) {
            $me = $me->where('email', auth()->user()->email)->first();
            if ($hodimlar->id !== $me->id) {
                return view("no-permission");
            }
        } else {
            $hodim = $hodimlar;
            return view('hodimlar.edit', compact('hodim'));
        }
        //dd($me);

        //dd($me);
        //dd($hodimlar->id);




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hodimlar $hodimlar)
    {
        // o'zgartirish    

        //dd($request);
        $data = $request->validate([
            'ism' => 'required',
            'familya' => 'required',
            'sharif' => 'required',
            'upload_image' => 'image|nullable|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'lavozim' => 'required',
            'xona_nomer' => 'required|integer',
            'email' => 'required|email',
            'tel_raqam' => 'required',
            'tarjimai_hol' => 'required'
        ]);



        if ($request->hasFile('upload_image')) {
            $filemodel = $request->file("upload_image");
            $fileNameWithExt = $filemodel->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $filemodel->getClientOriginalExtension();
            $fileNameToStore = $filename . "_" . time() . "." . $ext;
            #Storage::disk('talaba')->put('', $filemodel, $fileNameToStore);
            $request->file("upload_image")->storeAs("", $fileNameToStore, "talaba");
            #$path = $filemodel->storeAs('public/images', $fileNameToStore);
        }


        $hodimlar->ism = $data['ism'];
        $hodimlar->familya = $data['familya'];
        $hodimlar->sharif = $data['sharif'];
        $hodimlar->rasm = $fileNameToStore;
        $hodimlar->lavozim = $data['lavozim'];
        $hodimlar->email = $data['email'];
        $hodimlar->xona_nomer = $data['xona_nomer'];
        $hodimlar->tel_raqam = $data['tel_raqam'];
        $hodimlar->tarjimai_hol = $data['tarjimai_hol'];

        $hodimlar->save();
        return redirect()->route('hodimlar.index')->with('message', "Hodim ma'lumotlari o'zgartirildi");
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
