import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,

        }),

    ],
    build: {
        minify: 'esbuild',  // Minify JavaScript using esbuild for faster builds
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                },
            },
        },
        terserOptions: {
            compress: {
                drop_console: true,  // Remove console logs in production
                drop_debugger: true  // Remove debugger statements
            },
        },
    },

});
