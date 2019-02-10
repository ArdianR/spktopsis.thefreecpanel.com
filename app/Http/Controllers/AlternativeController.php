<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternative;

class AlternativeController extends Controller
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
        $alternatives = Alternative::paginate(10);
        return view('alternative.index',compact('alternatives'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternative.create');
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
            'phone_number' => 'required|numeric',
            'address' => 'required',
        ]);

        Alternative::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('alternative.index')->with('success','Alternatif berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alternatives = Alternative::findOrFail($id);
        return view('alternative.show',compact('alternatives'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatives = Alternative::findOrFail($id);
        return view('alternative.edit',compact('alternatives'))->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
        ]);

        Alternative::findOrFail($id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('alternative.index')->with('success','Alternatif berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alternative::findOrFail($id)->delete();
        return redirect()->route('alternative.index')->with('success','Alternatif berhasil dihapus');
    }
}
