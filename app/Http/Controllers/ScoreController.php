<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Alternative;
use App\Score;

class ScoreController extends Controller
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
        $criterias = Criteria::paginate(10);
        $alternatives = Alternative::all();
        return view('score.index',compact('criterias', 'alternatives'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = Criteria::paginate(10);
        $alternatives = Alternative::doesntHave('scores')->get();
        return view('score.create',compact('criterias', 'alternatives'))->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alternative = Alternative::find($request->alternative_id);
        $criterias = Criteria::all();

        foreach ($criterias as $key => $criteria) {
            $criteria_id = 'criteria_'.$criteria->id;
            $criteria_score = 'score_'.$key;

            $this->validate($request, [
                $criteria_score => 'required|integer',
            ]);

            $alternative->scores()->create([
                'criteria_id' => $request->$criteria_id,
                'score' => $request->$criteria_score,
            ]);
        }

        return redirect()->route('score.index')->with('success','Penilaian Berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        return view('score.show')->with([
            'scores' => Score::where('alternative_id',$alternative->id)->orderBy('criteria_id')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternative $alternative)
    {
        $scores = Score::where('alternative_id',$alternative->id)->orderBy('criteria_id')->get();

        foreach ($scores as $key => $score) {
            $criteria_score = 'score_'.$key;

            $this->validate($request, [
                $criteria_score => 'required|integer',
            ]);

            $score->update([
                'score' => $request->$criteria_score,
            ]);
        }

        return redirect()->route('score.index')->with('info','Penilaian berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(ALternative $alternative)
    {
        Score::where('alternative_id',$alternative->id)->delete();

        return redirect()->route('score.index')->with('info','Penilaian berhasil dihapus');
    }
}
