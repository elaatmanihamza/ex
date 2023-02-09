import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({



            input: ['resources/css/app.css', 'resources/js/app.js',

            'resources/filament/filament-stimulus.js',
            'resources/filament/filament-turbo.js',
        ],
            refresh: true,
        }),
    ],
});
