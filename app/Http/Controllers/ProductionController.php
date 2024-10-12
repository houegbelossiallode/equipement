<?php

namespace App\Http\Controllers;

use App\Models\informationproduit;
use Illuminate\Http\Request;

class ProductionController extends Controller
{

    public function create(){
        //$produits = informationproduit::all();
        return view('produits.create');
     }
    public function index(){

        $tommorrow = now()->addDay()->format('d/m/Y');
       // dd($tommorrow);
       $produits = informationproduit::all();
       return view('produits.index', compact('produits'));
    }

    public function edit($id){
        $produit = informationproduit::findOrFail($id);
        return view('produits.edit',compact('produit'));
     }
    public function store(Request $request)
    {
       // dd($request->all());
        // Valider les données du formulaire
        // $request->validate([
        //     'nom' => 'required|string',
        //     'profession' => 'required|string',
        //     'type_vehicule' => 'required|string',
        //     'carburant' => 'required|string|in:essence,diesel',
        //     'tarif_1an_100' => 'required|numeric',
        //     'tarif_6mois_100' => 'required|numeric',
        //     'tarif_3mois_100' => 'required|numeric',
        //     'tarif_1mois_100' => 'required|numeric',
        // ]);

        // Créer une structure JSON pour les informations du produit
        $informations = [
            'type_vehicule' => $request->type_vehicule,
            'carburant' => $request->carburant,
            'profession'=> $request->profession,
            'tarifs' => [
                '1 an' => [
                    '100%' => $request->tarif_1an_100,
                    '-10%' => $request->tarif_1an_10,
                    '-15%' => $request->tarif_1an_15,
                    '-20%' => $request->tarif_1an_20,
                ],
                '6 mois' => [
                    '100%' => $request->tarif_6mois_100,
                    '-10%' => $request->tarif_6mois_10,
                    '-15%' => $request->tarif_6mois_15,
                    '-20%' => $request->tarif_6mois_20,
                ],
                '3 mois' => [
                    '100%' => $request->tarif_3mois_100,
                    '-10%' => $request->tarif_3mois_10,
                    '-15%' => $request->tarif_3mois_15,
                    '-20%' => $request->tarif_3mois_20,
                ],
                '1 mois' => [
                    '100%' => $request->tarif_1mois_100,
                    '-10%' => $request->tarif_1mois_10,
                    '-15%' => $request->tarif_1mois_15 ,
                    '-20%' => $request->tarif_1mois_20,
                ],
            ]
        ];

        // Ajouter les champs dynamiques à la structure JSON
        if ($request->has('dynamic_fields')) {
            foreach ($request->dynamic_fields as $field) {
                if (isset($field['name']) && isset($field['value'])) {
                    $informations[$field['name']] = $field['value'];
                }
            }
        }

        // Créer un nouveau produit et enregistrer les informations en JSON
        informationproduit::create([
            'nom' => $request->nom,
            'informations' => json_encode($informations),  // Enregistrer les données en JSON
        ]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Produit enregistré avec succès.');
    }


    public function update(Request $request, $id)
    {

            // Valider les données de base
            $request->validate([
                'nom' => 'required|string',
                'type_vehicule' => 'required|string',
                'carburant' => 'required|string|in:essence,diesel',
                'tarif_1an_100' => 'required|numeric',
            ]);

            // Récupérer le produit existant
            $produit = informationproduit::findOrFail($id);

            // Décoder les informations JSON existantes en tableau PHP
            $informations = json_decode($produit->informations, true);

            // Mettre à jour les informations de base
            $informations['type_vehicule'] = $request->type_vehicule;
            $informations['carburant'] = $request->carburant;

            // Mettre à jour les tarifs
            $informations['tarifs']['1 an']['100%'] = $request->tarif_1an_100;
            $informations['tarifs']['1 an']['-10%'] = $request->tarif_1an_10;
            $informations['tarifs']['1 an']['-15%'] = $request->tarif_1an_15;
            $informations['tarifs']['1 an']['-20%'] = $request->tarif_1an_20;

            // Mettre à jour les champs dynamiques existants
            if ($request->has('existing_fields')) {
                foreach ($request->existing_fields as $key => $value) {
                    $informations[$key] = $value; // Mise à jour des champs existants
                }
            }

            // Ajouter de nouveaux champs dynamiques
            if ($request->has('dynamic_fields')) {
                foreach ($request->dynamic_fields as $field) {
                    if (isset($field['name']) && isset($field['value'])) {
                        $informations[$field['name']] = $field['value'];
                    }
                }
            }

            // Mettre à jour le produit avec les nouvelles informations JSON
            $produit->nom = $request->nom;
            $produit->informations = json_encode($informations);  // Encoder de nouveau en JSON
            $produit->save();

            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Produit mis à jour avec succès.');

        }














}