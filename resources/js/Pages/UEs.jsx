import React from 'react';
import AppLayout from '../Layouts/AppLayout';

export default function UEs({ ues }) {
    return (
        <AppLayout>
            <h1 className="text-2xl font-bold mb-4">Liste des UEs</h1>
            <ul>
                {ues.map(ue => (
                    <li key={ue.id}>{ue.code} - {ue.nom} - {ue.credits_ects} crédits</li>
                ))}
            </ul>
        </AppLayout>
    );
}
