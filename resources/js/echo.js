import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});
window.Echo.channel('my-channel')
    .listen('SendRealtimeMessage', (e) => {
        console.log(e)
    })
    window.Echo.join('user-status')
    .here((users) => {
        // Handle initial presence status
        console.log('Online users:', users);
    })
    .joining((user) => {
        // Handle user joining
        console.log('User joined:', user);
    })
    .leaving((user) => {
        // Handle user leaving
        console.log('User left:', user);
    });
