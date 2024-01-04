import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';
import pluginPurgeCss from "@mojojoejo/vite-plugin-purgecss";
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';
import { optimizeCssModules } from 'vite-plugin-optimize-css-modules';

export default defineConfig(({ mode }) => {
    const isProduction = mode === 'development' ? false : true;
    return {
        plugins: [
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
            isProduction ? pluginPurgeCss({
                content: [
                    './resources/views/**/*.blade.php',
                    './resources/js/**/*.js',
                ],
                defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
            }) : '',
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
