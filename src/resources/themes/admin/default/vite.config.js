import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    build: {
        outDir: '../../../../public/themes/admin/default/'
    },
    plugins: [
        laravel({
            input: [
                'assets/plugins/jquery/jquery.min.js',
                'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
                'assets/plugins/charts/Chart.min.js',
                'assets/js/chart.js',
                'assets/js/sleek.js',
                'assets/source/scss/sleek.scss',
                'assets/plugins/nprogress/nprogress.js',
                'assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js',
                'assets/plugins/jvectormap/jquery-jvectormap-world-mill.js',
                'assets/plugins/daterangepicker/moment.min.js',
                'assets/plugins/daterangepicker/daterangepicker.js',
                'assets/js/date-range.js',
                'assets/plugins/nprogress/nprogress.css',
                'assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css',
                'assets/plugins/daterangepicker/daterangepicker.css',
                'assets/plugins/toastr/toastr.min.css',
                'assets/plugins/toastr/toastr.min.js',
                'assets/plugins/simplebar/simplebar.min.js',
                'assets/plugins/simplebar/simplebar.css',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    }
});
