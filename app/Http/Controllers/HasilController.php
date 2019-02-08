<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobotGuru;
use App\Guru;
use App\Kriteria;
use App\Hasil;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot_guru = BobotGuru::all();
        $kriterias = Kriteria::all();
        $guru = Guru::all();

        dd($guru);

        // for ($i=0; $i < count($dm); $i++) {

        //     $pembagi[$i] = 0;

        //     for ($j=0; $j < count($dm[$i]); $j++) { 

        //         $pow = pow( $dm[$j][$i], 2 );

        //         $pembagi[$i] = $pembagi[$i] + $pow;

        //     }

        //     $pembagi[$i] = round(sqrt($pembagi[$i]),4);
        //     echo $pembagi[$i]."</br>";

            
        // }

        // $hasil = new Hasil;
        // $hasil->created_date = now();
        // echo $hasil->save();


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

        $guru = Guru::all();

        for ($i=0; $i < count($guru); $i++) {

            $pembagi[$i] = 0;

            for ($j=0; $j < count($guru[$i]); $j++) { 

                $pow = pow( $guru[$j][$i], 2 );

                $pembagi[$i] = $pembagi[$i] + $pow;

            }

            $pembagi[$i] = round(sqrt($pembagi[$i]),4);
            echo $pembagi[$i]."</br>";

            
        }
        
        echo "Pembagi";

        // for($k=0; $k < count($dm); $k++){

        //     for($k=0; $k < count($dm); $k++){
        //         $nor[$i][$j] = round(($dm[$i][$j] / $pembagi[$j]),4);
        //         echo "<td>".$nor[$i][$j]."</td>";
        //     }
        //     echo "</tr>";
        // }

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
