import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // server: {
    //     hmr: {
    //         host: 'http://18.181.254.141/',
    //     },
    // },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/css/modal.css',
                'resources/js/app.js',
                'public/js/make_select.js',
                'public/js/modal.js',
                'resources/sass/app.scss',
            ],
            refresh: true,
        }),
    ],
});

