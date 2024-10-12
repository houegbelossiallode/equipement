<?php

namespace App\Http\Controllers;

use App\Models\Champ;
use App\Models\Offre;
use Illuminate\Http\Request;

class ChampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($offreId)
    {
        $offre = Offre::findOrFail($offreId);
        return view('champ.create',compact('offre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $offreId)
    {
      //  $champ = new Champ();
      //  $request->validate([
       //     'type' => 'required|string',
       //     'label' => 'required|string',
      //  ]);
      $options  = json_encode(explode(',', $request->input('options')));
        $offre = Offre::findOrFail($offreId);
        $offre->champs()->create([
            'type' => $request->type,
            'label' => $request->label,
            'options'=> $options,
        ]);



            //Stocker les options comme une chaîne JSON



        return redirect()->route('offres.show', $offreId)->with('success', 'Champ ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Champ $champ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Champ $champ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Champ $champ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Champ $champ)
    {
        //
    }
}