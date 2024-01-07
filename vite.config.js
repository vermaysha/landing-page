import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';
import { optimizeCssModules } from 'vite-plugin-optimize-css-modules';
import cleanPlugin from 'vite-plugin-clean';


export default defineConfig(({ mode }) => {
    const isProduction = mode === 'development' ? false : true;
    return {
        plugins: [
            cleanPlugin(['public/build']),
            laravel({
                input: [
                    'resources/js/app.js',
                    'resources/scss/home.scss'
                ],
                refresh: true,
            }),
            manifestSRI(),
            ViteImageOptimizer(),
            optimizeCssModules(),
        ],
        resolve: {
            alias: {
                '~': './',
            },
        },
        build: {
            sourcemap: true,
        },
    };
});
