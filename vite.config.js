import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/login.css',
                'resources/css/signup.css',
                'resources/js/signup.js',
                'resources/js/genre.js',
                'resources/css/genre.css',
                'resources/js/halamanutama.js',
                'resources/css/halamanutama.css'
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            // Tambahkan modul eksternal di sini jika perlu
            external: ['resources/js/landingpage/section.js'],
        },
    },
});