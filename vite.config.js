import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'
export default defineConfig({
    plugins: [
        laravel({
            input: [
         
                './resources/**/*.js',
                './resources/**/*.blade.php',
                './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
                
            ],
            refresh: true,
        }),tailwindcss({
            config: './tailwind.config.js',
            exposeConfig: false,
        }),
    ],
});
