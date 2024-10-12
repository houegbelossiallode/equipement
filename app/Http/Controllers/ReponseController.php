<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $offreId)
    {

       // dd($request);


        $offre = Offre::findOrFail($offreId);

        // Initialisé un tableau pour stocker les réponses
        $valeurs = [];

        //Pacourir les paramètres et les stocker dans le tableau $valeurs
        foreach ($request->except('_token')  as $key => $valeur) {
            $valeurs[$key] = $valeur;
        }

        Reponse::create([
            'offre_id' => $offreId,
            'valeurs' => json_encode($valeurs),
        ]);

        return redirect()->route('offres.index')->with('success', 'Réponse enregistrée avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reponse $reponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reponse $reponse,$id)
    {
        $reponse = Reponse::findOrFail($id);

        return view("offres.edit", compact("reponse"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // Valider les données si nécessaire
    $request->validate([
        'valeurs' => 'required|array',
    ]);

    // Récupérer la réponse par son ID
    $reponse = Reponse::findOrFail($id);

    // Mettre à jour les champs avec les nouvelles valeurs
    $reponse->valeurs = json_encode($request->input('valeurs'));

    // Sauvegarder les changements
    $reponse->save();

    // Rediriger avec un message de succès
    return redirect()->route('offres.liste')->with('success', 'Réponse mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reponse $reponse)
    {
        //
    }
}