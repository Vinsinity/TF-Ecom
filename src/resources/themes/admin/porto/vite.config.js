import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: '../../../../public/themes/Admin/Porto/'
    },
    plugins: [
        laravel({
            input: ['assets/css/app.css'],
            refresh: true,
        }),
    ],
});
