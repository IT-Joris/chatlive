import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.start();


import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});


