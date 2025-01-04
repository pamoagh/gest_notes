import React from 'react';

export default function UEs({ ues }) {
    return (
        <div>
            <h1>Liste des UEs</h1>
            <ul>
                {ues.map(ue => (
                    <li key={ue.id}>{ue.code} - {ue.nom} - {ue.credits_ects} crédits</li>
                ))}
            </ul>
        </div>
    );
}
