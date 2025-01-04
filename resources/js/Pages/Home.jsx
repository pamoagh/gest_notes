import React from 'react';

export default function Home() {
    return (
        <div className="min-h-screen flex flex-col justify-center items-center bg-gray-100">
            <h1 className="text-4xl font-bold text-gray-800 mb-4">Bienvenue au système de gestion des notes</h1>
            <p className="text-gray-600 mb-6">Naviguez entre les sections pour gérer les UEs, ECs et les notes.</p>
            <div className="flex space-x-4">
                <a href="/ues" className="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Gérer les UEs
                </a>
                <a href="/ecs" className="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Gérer les ECs
                </a>
                <a href="/notes" className="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Gérer les Notes
                </a>
            </div>
        </div>
    );
}
