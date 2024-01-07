import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import manifestSRI from 'vite-plugin-manifest-sri';
import pluginPurgeCss from "@mojojoejo/vite-plugin-purgecss";
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
            isProduction ? pluginPurgeCss({
                content: [
                    './resources/views/landing-page/**/*.blade.php',
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
