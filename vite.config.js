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
                'resources/js/app.js',
                'resources/js/make_select.js',
                'resources/sass/app.scss',
            ],
            refresh: true,
        }),
    ],
});

