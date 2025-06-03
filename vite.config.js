import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',      // ✅ Laravel expects this
        manifest: true,              // ✅ Required for Laravel to link assets
        emptyOutDir: true,           // Optional: clean build dir before building
    },
});
