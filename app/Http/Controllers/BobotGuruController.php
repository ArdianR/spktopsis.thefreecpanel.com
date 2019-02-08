<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobotGuru;
use App\Guru;
use App\Kriteria;

class BobotGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot_guru = BobotGuru::all();
        return view('bobot_guru.index',compact('bobot_guru'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $kriteria = Kriteria::all();
        return view('bobot_guru.create',compact('guru', 'kriteria'))->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_guru' => 'required|numeric'
        ]);


        for ($i=0; $i < count($request->bobot) ; $i++) { 

            $bobot_guru = new BobotGuru;
            $bobot_guru->id_guru = $request->id_guru;
            $bobot_guru->id_kriteria = $request['id_kriteria'][$i];
            $bobot_guru->bobot = $request['bobot'][$i];
            $bobot_guru->save();
        }

        return redirect()->route('bobot_guru.create')->with('success','created successfully');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
