<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobotGuru;
use App\Guru;
use App\Kriteria;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bobot_guru = BobotGuru::All();
        $kriterias = Kriteria::All();
        $guru = Guru::All();

        $sum = [];
        $sqrt = [];

        $normalization = [];
        $normalizationWeight = [];
        
        $solusiPlus = [];
        $solusiMinus = [];
        $_dPlus = [];
        $_dMinus = [];
        $result = [];
        
        foreach ($kriterias as $key => $kriteria) {
            
            $sum[$key] = 0;
            $sqrt[$key] = 0;
            
            foreach ($kriteria->bobotguru as $k => $bobotguru) {

                $pow = pow($bobotguru->bobot,2);
                $sum[$key] = $sum[$key] + $pow;

            }

            $sqrt[$key] = sqrt($sum[$key]);

        }

        foreach ($guru as $key => $guru) {

            $normalization[$key] = [];
            $normalizationWeight[$key] = [];

            foreach ($guru->bobotguru as $k => $bobotguru) {

                $normalization[$key][$k] = $bobotguru->bobot/$sqrt[$k];
                echo $normalizationWeight[$key][$k] = ($bobotguru->bobot/$sqrt[$k])*$kriteria->bobotkriteria[$k]->bobot;

            }

        }

        // foreach ($bobot_guru as $bobot_guru) {
        //     $pow_bobot_guru = new PowBobotGuru;
        //     $pow_bobot_guru->id_guru = $bobot_guru->id_guru;
        //     $pow_bobot_guru->id_kriteria = $bobot_guru->id_kriteria;
        //     $pow_bobot_guru->bobot = pow($bobot_guru->bobot, 2);
        //     $pow_bobot_guru->save();
        // }

        // $pow_bobot_guru = PowBobotGuru::All();

        // foreach ($kriteria as $kriteria) {
        //     $pow_bobot_guru = PowBobotGuru::All();
        //     dd($pow_bobot_guru);
        // }

        // dd($pow_bobot_guru);

        // return view('hasil.index', compact('bobot_guru', 'kriteria', 'pow_bobot_guru'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
