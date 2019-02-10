<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternative;
use App\Criteria;
use App\Score;

use App\Result;
use App\ResultCriterias;
use App\ResultAlternatives;
use App\ResultScores;

class ScoringController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $alternatives = Alternative::has('scores')->get();
        $criterias = Criteria::all();

        if (count(Alternative::has('scores')->get()) < 2) {
            return redirect()->route('score.index')->with('info','Belum ada nilai yang diinputkan');
        }

        $sums = [];
        $squares = [];
        $normalizations = [];
        $normalizationWeights = [];
        $solusiPlus = [];
        $solusiMinus = [];
        $_dPlus = [];
        $_dMinus = [];
        $result = [];

        foreach ($criterias as $key => $criteria) {
            $sums[$key] = 0;
            $squares[$key] = 0;
            foreach ($criteria->scores as $k => $score) {
                $_score = pow($score->score,2);
                $sums[$key] = $sums[$key] + $_score;
            }
            $squares[$key] = sqrt($sums[$key]);
        }

        foreach ($alternatives as $key => $alternative) {
            $normalizations[$key] = [];
            $normalizationWeights[$key] = [];
            foreach ($alternative->scores as $k => $score) {
                $normalizations[$key][$k] = $score->score/$squares[$k];
                $normalizationWeights[$key][$k] = ($score->score/$squares[$k])*$criterias[$k]->weight;
            }
        }

        for ($i=0; $i < count(current($normalizationWeights)); $i++) { 
            $solusiPlus[] = max(array_column($normalizationWeights, $i));
            $solusiMinus[] = min(array_column($normalizationWeights, $i));
        }

        foreach ($normalizationWeights as $key => $normalizationWeight) {
            $_dPlus[$key] = [];
            $_dMinus[$key] = [];
            foreach ($normalizationWeight as $k => $nW) {
                $_dPlus[$key][] = pow($nW-$solusiPlus[$k],2);
                $_dMinus[$key][] = pow($nW-$solusiMinus[$k],2);
            }
        }

        foreach ($alternatives as $key => $alternative) {
            $result[$key] = [];
            $result[$key]['data'] = $alternative->name;
            $result[$key]['dMinus'] = sqrt(array_sum($_dMinus[$key]));
            $result[$key]['dPlus'] = sqrt(array_sum($_dPlus[$key]));
            $result[$key]['v'] = $result[$key]['dMinus']/($result[$key]['dMinus']+$result[$key]['dPlus']);
        }

        // mengurutkan berdasarkan v terbesar
        uasort($result, function ($a,$b) {
            return $a['v'] < $b['v'];
        });

        return view('scoring.index')->with([
            'pangkats' => $squares,
            'criterias' => $criterias,
            'alternatives' => $alternatives,
            'squares' => $squares,
            'normalizations' => $normalizations,
            'normalizationWeights' => $normalizationWeights,
            'solusiPlus' => $solusiPlus,
            'solusiMinus' => $solusiMinus,
            'result' => $result,
        ]);
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
        $result = Result::create();
        
        if ($result) {

            $criterias = Criteria::all();

            for ($i=0; $i < count($criterias); $i++) { 
                
                $result_criterias = new ResultCriterias;
                $result_criterias->id_result = $result->id_result;
                $result_criterias->name = $criterias[$i]->name;
                $result_criterias->weight = $criterias[$i]->weight;
                $result_criterias->save();

            }

            $alternatives = Alternative::has('scores')->get();

            for ($a=0; $a < count($alternatives); $a++) { 
                
                $result_alternatives = new ResultAlternatives;
                $result_alternatives->id_result = $result->id_result;
                $result_alternatives->name = $alternatives[$a]->name;
                $result_alternatives->phone_number = $alternatives[$a]->phone_number;
                $result_alternatives->address = $alternatives[$a]->address;
                $result_alternatives->save();

            }

            $scores = Score::all();

            for ($b=0; $b < count($scores); $b++) { 
                
                $result_scores = new ResultScores;
                $result_scores->id_result = $result->id_result;
                $result_scores->id_alternatives = $scores[$b]->alternative_id;
                $result_scores->id_criterias = $scores[$b]->criteria_id;
                $result_scores->score = $scores[$b]->score;
                $result_scores->save();

            }

        }

        return redirect()->route('scoring.show', $result->id_result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = Result::findOrFail($id);

        if ($results) {

            $criterias = ResultCriterias::where('id_result',$id)->get();
            $alternatives = ResultAlternatives::where('id_result',$id)->get();
            $scores = ResultScores::where('id_result',$id)->get();

            $sums = [];
            $squares = [];
            $normalizations = [];
            $normalizationWeights = [];
            $solusiPlus = [];
            $solusiMinus = [];
            $_dPlus = [];
            $_dMinus = [];
            $result = [];

            foreach ($criterias as $key => $criteria) {
                $sums[$key] = 0;
                $squares[$key] = 0;
                foreach ($criteria->scores as $k => $score) {
                    $_score = pow($score->score,2);
                    $sums[$key] = $sums[$key] + $_score;
                }
                $squares[$key] = sqrt($sums[$key]);
            }

            foreach ($alternatives as $key => $alternative) {
                $normalizations[$key] = [];
                $normalizationWeights[$key] = [];
                foreach ($alternative->scores as $k => $score) {
                    $normalizations[$key][$k] = $score->score/$squares[$k];
                    $normalizationWeights[$key][$k] = ($score->score/$squares[$k])*$criterias[$k]->weight;
                }
            }

            for ($i=0; $i < count(current($normalizationWeights)); $i++) { 
                $solusiPlus[] = max(array_column($normalizationWeights, $i));
                $solusiMinus[] = min(array_column($normalizationWeights, $i));
            }

            foreach ($normalizationWeights as $key => $normalizationWeight) {
                $_dPlus[$key] = [];
                $_dMinus[$key] = [];
                foreach ($normalizationWeight as $k => $nW) {
                    $_dPlus[$key][] = pow($nW-$solusiPlus[$k],2);
                    $_dMinus[$key][] = pow($nW-$solusiMinus[$k],2);
                }
            }

            foreach ($alternatives as $key => $alternative) {
                $result[$key] = [];
                $result[$key]['data'] = $alternative->name;
                $result[$key]['dMinus'] = sqrt(array_sum($_dMinus[$key]));
                $result[$key]['dPlus'] = sqrt(array_sum($_dPlus[$key]));
                $result[$key]['v'] = $result[$key]['dMinus']/($result[$key]['dMinus']+$result[$key]['dPlus']);
            }

            // mengurutkan berdasarkan v terbesar
            uasort($result, function ($a,$b) {
                return $a['v'] < $b['v'];
            });

            return view('scoring.index')->with([
                'pangkats' => $squares,
                'criterias' => $criterias,
                'alternatives' => $alternatives,
                'squares' => $squares,
                'normalizations' => $normalizations,
                'normalizationWeights' => $normalizationWeights,
                'solusiPlus' => $solusiPlus,
                'solusiMinus' => $solusiMinus,
                'result' => $result,
            ]);

        }        


        dd($id, $result, $result_criterias, $result_alternatives, $result_scores);
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
