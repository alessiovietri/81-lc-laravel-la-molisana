<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Pasta;

// Helpers
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

// Requests
use App\Http\Requests\PastaRequest;

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
     *
     * 1. perché dà errore su description           OK
     * 2. vecchi dati                               OK
     * 3. localizzazione                            OK
     * 4. messaggi d'errore personalizzati          OK
     * 5. stile campi validati in view              OK
     * 6. terzo metodo
     *
     */

    private function validateData($data)
    {
        // Validiamo i nostri dati
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(['lunga', 'corta', 'cortissima'])
            ],
            'cooking_time' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:100',
            'description' => 'nullable|max:4096'
        ], [
            'title.required' => 'TITOLO OBBLIGATORIO!!!',
            'type.required' => 'TIPO OBBLIGATORIO!!!',
            'cooking_time.required' => 'TEMPO DI COTTURA OBBLIGATORIO!!!',
        ])->validate();

        return $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastaRequest $request)
    {
        // Validiamo i nostri dati
        // $data = $this->validateData($request->all());
        $data = $request->validated();

        // Utilizziamo i nostri dati
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
    public function update(PastaRequest $request, $id)
    {
        $pasta = Pasta::findOrFail($id);

        // Validiamo i nostri dati
        // $data = $this->validateData($request->all());
        $data = $request->validated();

        // Utilizziamo i nostri dati
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
