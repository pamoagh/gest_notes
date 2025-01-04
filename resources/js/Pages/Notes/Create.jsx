import React from 'react';

export default function Create({ ecs, etudiants }) {
    return (
        <div>
            <h1>Ajouter une Note</h1>
            <form action="/notes" method="POST">
                <select name="etudiant_id">
                    {etudiants.map(etudiant => (
                        <option key={etudiant.id} value={etudiant.id}>
                            {etudiant.nom} {etudiant.prenom} ({etudiant.numero_etudiant})
                        </option>
                    ))}
                </select>
                <select name="ec_id">
                    {ecs.map(ec => (
                        <option key={ec.id} value={ec.id}>
                            {ec.nom} ({ec.code})
                        </option>
                    ))}
                </select>
                <input type="number" name="note" min="0" max="20" step="0.25" />
                <select name="session">
                    <option value="normale">Session Normale</option>
                    <option value="rattrapage">Session de Rattrapage</option>
                </select>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    );
}
