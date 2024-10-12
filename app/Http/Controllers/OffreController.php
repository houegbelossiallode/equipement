<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Reponse;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

      $offres = Offre::all();
      return view('offres.index',compact('offres'));



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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($offreId)
    {

    $offre = Offre::findOrFail($offreId);
    return view('offres.show',compact('offre'));



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offre $offre)
    {
        //
    }


    public function liste()
    {
        
        
        $reponses = Reponse::all(); // Récupérer toutes les réponses pour l'offre
        

       return view('offres.liste', compact( 'reponses'));


        
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        //
    }
}