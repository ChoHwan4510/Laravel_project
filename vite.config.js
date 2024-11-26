import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //css
                'resources/scss/main.scss', 
                'resources/scss/playGround/playGroundApp.scss',
                //js
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
