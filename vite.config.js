import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    base: '/',
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                
                'resources/css/argon-dashboard-tailwind.css',
                'resources/js/plugins/chartjs.min.js',
                'resources/js/plugins/perfect-scrollbar.min.js',
                'resources/js/app.js',
                // 'resources/js/argon-dashboard-tailwind.js',


            ],
            refresh: true,
        }),
    ],
});
