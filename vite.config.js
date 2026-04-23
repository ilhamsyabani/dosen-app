import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    css: {
      preprocessorOptions: {
        scss: {
          // This will silence warnings from files imported from node_modules
          quietDeps: true 
        }
      }
    }
});
