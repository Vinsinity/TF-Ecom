import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: '../../../../public/themes/frontend/default/'
    },
    plugins: [
        laravel({
            input: ['assets/app.css'],
            refresh: true,
        }),
    ],
});
