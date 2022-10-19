import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
const path = require('path')
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/dashboard/scss/dashboard_app.scss',
                'resources/dashboard/js/dashboard_app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            "@": path.resolve(__dirname, "./resources/dashboard/js"),
            "styles@": path.resolve(__dirname, "./resources/dashboard/scss"),
        },
    },
});
