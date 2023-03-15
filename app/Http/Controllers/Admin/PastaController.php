<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Pasta;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::all();

        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $singlePasta = new Pasta;
        $singlePasta->title = $data['title'];
        $singlePasta->type = $data['type'];
        $singlePasta->cooking_time = $data['cooking_time'];
        $singlePasta->weight = $data['weight'];
        $singlePasta->image = null;
        $singlePasta->description = $data['description'];
        $singlePasta->save();

        return redirect()->route('pastas.show', $singlePasta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasta = Pasta::findOrFail($id);

        return view('pastas.show', compact('pasta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasta = Pasta::findOrFail($id);

        return view('pastas.edit', compact('pasta'));
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
        $pasta = Pasta::findOrFail($id);

        $data = $request->all();

        $pasta->update($data);

        // Alternativa a:
        // $pasta->title = $data['title'];
        // $pasta->type = $data['type'];
        // $pasta->cooking_time = $data['cooking_time'];
        // $pasta->weight = $data['weight'];
        // $pasta->image = null;
        // $pasta->description = $data['description'];
        // $pasta->save();

        return redirect()->route('pastas.show', $pasta->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasta = Pasta::findOrFail($id);

        $pasta->delete();

        return redirect()->route('pastas.index');
    }
}
