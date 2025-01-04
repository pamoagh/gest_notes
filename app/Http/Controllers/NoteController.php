<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\EC;
use App\Models\Etudiant;
use Inertia\Inertia;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ici, tu pourrais récupérer les notes et les afficher dans une vue
        $notes = Note::with(['etudiant', 'ec'])->get();  // Récupère les notes avec les étudiants et EC associés
        return Inertia::render('Notes/Index', [
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecs = EC::all();  // Récupère toutes les unités d'enseignement
        $etudiants = Etudiant::all();  // Récupère tous les étudiants
        return Inertia::render('Notes/Create', [
            'ecs' => $ecs,
            'etudiants' => $etudiants
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:elements_constitutifs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
        ]);
    
        // Création de la nouvelle note
        Note::create([
            'etudiant_id' => $request->etudiant_id,
            'ec_id' => $request->ec_id,
            'note' => $request->note,
            'session' => $request->session,
            'date_evaluation' => now(),  // Date de l'évaluation (si nécessaire)
        ]);

        // Redirige vers la liste des notes avec un message de succès
        return redirect()->route('notes.index')->with('success', 'Note ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Affiche une note spécifique si nécessaire
        $note = Note::with(['etudiant', 'ec'])->findOrFail($id);
        return Inertia::render('Notes/Show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Récupère la note à modifier et les données nécessaires
        $note = Note::findOrFail($id);
        $ecs = EC::all();
        $etudiants = Etudiant::all();

        return Inertia::render('Notes/Edit', [
            'note' => $note,
            'ecs' => $ecs,
            'etudiants' => $etudiants
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données envoyées par le formulaire
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:elements_constitutifs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
        ]);
        
        // Trouve la note et met à jour les informations
        $note = Note::findOrFail($id);
        $note->update([
            'etudiant_id' => $request->etudiant_id,
            'ec_id' => $request->ec_id,
            'note' => $request->note,
            'session' => $request->session,
            'date_evaluation' => now(),  // Mise à jour de la date si nécessaire
        ]);

        // Redirige vers la liste des notes avec un message de succès
        return redirect()->route('notes.index')->with('success', 'Note mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Supprimer une note
        $note = Note::findOrFail($id);
        $note->delete();

        // Redirige vers la liste des notes avec un message de succès
        return redirect()->route('notes.index')->with('success', 'Note supprimée avec succès !');
    }
}
