import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: '../../../../public/themes/frontend/default/'
    },
    plugins: [
        laravel({
            input: [
                'assets/app.css',
                'assets/css/bootstrap.min.css',
                'assets/css/templatemo.css',
                'assets/css/custom.css',
                'assets/css/fontawesome.min.css',
                'assets/js/jquery-1.11.0.min.js',
                'assets/js/jquery-migrate-1.2.1.min.js',
                'assets/js/bootstrap.bundle.min.js',
                'assets/js/templatemo.js',
                'assets/js/custom.js',
            ],
            refresh: true,
        }),
    ],
});
