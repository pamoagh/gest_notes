import React from 'react';

export default function Notification({ message, type }) {
    const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';

    return (
        <div className={`fixed top-4 right-4 p-4 text-white rounded ${bgColor}`}>
            {message}
        </div>
    );
}
