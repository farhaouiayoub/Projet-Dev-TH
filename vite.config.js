import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/static.css', // Add this
                'resources/css/auth.css', // Add this
                'resources/css/formule.css', // Add this
                'resources/css/history.css', // Add this
                'resources/css/gestion.css', // Add this
                'resources/css/home.css', // Add this
                'resources/css/rating.css', // Add this
                'resources/css/static.css', // Add this
                'resources/css/themes.css', // Add this
                'resources/css/pagination.css', // Add this
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

