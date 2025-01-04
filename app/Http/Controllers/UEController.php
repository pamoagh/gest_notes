<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UE;
use Inertia\Inertia;

class UEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les UEs
        $ues = UE::all();

        // Retourner la vue Inertia
        return Inertia::render('UEs', ['ues' => $ues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('UECreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider la requête
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:unites_enseignement',
            'nom' => 'required|string|max:255',
            'credits_ects' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6',
        ]);

        // Créer une nouvelle UE
        UE::create($validated);

        // Rediriger vers la liste des UEs
        return redirect()->route('ues.index')->with('success', 'UE créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ue = UE::findOrFail($id);

        return Inertia::render('UEShow', ['ue' => $ue]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ue = UE::findOrFail($id);

        return Inertia::render('UEEdit', ['ue' => $ue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:unites_enseignement,code,' . $id,
            'nom' => 'required|string|max:255',
            'credits_ects' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6',
        ]);

        $ue = UE::findOrFail($id);
        $ue->update($validated);

        return redirect()->route('ues.index')->with('success', 'UE mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ue = UE::findOrFail($id);
        $ue->delete();

        return redirect()->route('ues.index')->with('success', 'UE supprimée avec succès.');
    }
}
