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
        $dm = [
                [690, 3.1, 478, 7, 4, 60],
                [590, 3.9, 788, 6, 10, 50],
                [600, 3.6, 798, 8, 7, 40],
                [620, 3.8, 478, 7, 4, 30],
                [700, 2.8, 478, 7, 4, 20],
                [650, 4, 478, 7, 4, 10]
        ];

        // $sum = [];


        for ($i=0; $i < count($dm); $i++) {

            $sum = [];

            // print_r($dm[$i]);
            // print_r('</br>');
            // print_r('</br>');

            for ($j=0; $j < count($dm[$i]); $j++) { 

                $pow = pow( $dm[$i][$j], 2);

                // print_r($dm[$j][$i]);
                print_r(array($j = array($pow)));
                print_r('</br>');
                // print_r($sum = array($pow));
                // print_r('</br>');


            }
            print_r('</br>');
            // print_r($sum);
            // print_r('</br>');
            // print_r('</br>');
            // print_r('</br>');
        }



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
