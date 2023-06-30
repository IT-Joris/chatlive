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

const chatApp = document.getElementById('chatApp');

window.Echo.private(`channel.1`)
    .listen('SendMessageEvent', (e) => {
        //chatApp
        console.log(e)
        const template = `
        <div class="flex w-full mt-2 space-x-3 max-w-xs">
                <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                    <p class="text-sm">${e.message.content}</p>
                </div>
            </div>
        `;

        chatApp.insertAdjacentHTML('beforeend', template)
    });


const chatAppScroll = document.getElementById('chatAppScroll');
chatAppScroll.scrollTop = chatAppScroll.scrollHeight;
