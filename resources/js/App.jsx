import { usePage } from '@inertiajs/react';
import Notification from './Components/Notification';

export default function App() {
    const { flash } = usePage().props;

    return (
        <div>
            {flash.success && <Notification message={flash.success} type="success" />}
            {flash.error && <Notification message={flash.error} type="error" />}
        </div>
    );
}
