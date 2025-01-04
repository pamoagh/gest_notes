import React from 'react';

export default function AppLayout({ children }) {
    return (
        <div>
            <nav className="bg-gray-800 text-white p-4">
                <div className="container mx-auto flex justify-between">
                    <a href="/" className="font-bold">Gestion des Notes</a>
                    <div className="space-x-4">
                        <a href="/ues" className="hover:text-gray-300">UEs</a>
                        <a href="/ecs" className="hover:text-gray-300">ECs</a>
                        <a href="/notes" className="hover:text-gray-300">Notes</a>
                    </div>
                </div>
            </nav>
            <main className="container mx-auto mt-6">
                {children}
            </main>
        </div>
    );
}
