<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;

class CriteriaController extends Controller
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
        return view('criteria.index',compact('criterias'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criteria.create');
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
            'name' => 'required',
            'weight' => 'required|integer',
        ]);

        Criteria::create([
            'name' => $request->name,
            'weight' => $request->weight,
        ]);

        return redirect()->route('criteria.index')->with('success','Kriteria berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $criterias = Criteria::findOrFail($id);
        return view('criteria.show',compact('criterias'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criterias = Criteria::findOrFail($id);
        return view('criteria.edit',compact('criterias'))->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required|integer',
        ]);

        Criteria::findOrFail($id)->update([
            'name' => $request->name,
            'weight' => $request->weight,
        ]);

        return redirect()->route('criteria.index')->with('success','Kriteria berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Criteria::findOrFail($id)->delete();
        return redirect()->route('criteria.index')->with('success','Kriteria berhasil dihapus');
    }
}
