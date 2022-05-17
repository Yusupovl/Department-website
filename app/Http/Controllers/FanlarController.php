<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fan;

class FanlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fan = Fan::all();
        return view('fanlar.index', compact('fan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fanlar.create');
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
            'upload_file' => 'nullable|mimes:pdf|max:10000'
        ]);

        if ($request->hasFile('upload_file')) {
            $filemodel = $request->file("upload_file");
            $fileNameWithExt = $filemodel->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $filemodel->getClientOriginalExtension();
            $fileNameToStore = $filename . "_" . time() . "." . $ext;
            #Storage::disk('talaba')->put('', $filemodel, $fileNameToStore);
            $request->file("upload_file")->storeAs("", $fileNameToStore, "fan");
            #$path = $filemodel->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        $fan = new Fan();
        $fan->nomi = $data['nomi'];
        $fan->syllabus = $fileNameToStore;
        $fan->save();

        return redirect()->route('fanlar.index')->with('message', "Yangi fan qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fan $fanlar)
    {
        $fan = $fanlar;
        return view('fanlar.edit', compact('fan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fan $fanlar)
    {
        // return 1;
        $data = $request->validate([
            'nomi' => 'required',
            'upload_file' => 'nullable|mimes:pdf|max:10000'
        ]);

        if ($request->hasFile('upload_file')) {
            $filemodel = $request->file("upload_file");
            $fileNameWithExt = $filemodel->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $filemodel->getClientOriginalExtension();
            $fileNameToStore = $filename . "_" . time() . "." . $ext;
            #Storage::disk('talaba')->put('', $filemodel, $fileNameToStore);
            $request->file("upload_file")->storeAs("", $fileNameToStore, "talaba");
            #$path = $filemodel->storeAs('public/images', $fileNameToStore);
            $fanlar->syllabus = $fileNameToStore;
        }


        $fanlar->nomi = $data['nomi'];
        $fanlar->save();
        return redirect()->route('fanlar.index')->with('message', "Fan ma'lumotlari o'zgartirildi");
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
