import { defineConfig, splitVendorChunkPlugin } from 'vite'
import FullReload from 'vite-plugin-full-reload'
import liveReload from 'vite-plugin-live-reload'

import {resolve} from 'path'
//export default defineConfig(({command, mode}) => ({
module.exports = defineConfig({

//export default ({command, mode}) => ({
    // please update the path name [chkilel-vitewind] to your theme folder name
    base: '/', //command === 'dev' ? '/resources/quivi/' : '/theme/assets/',
    publicDir: 'fake_dir_so_nothing_gets_copied',
    //publicDir: '/resources/quivi/',
    processCssUrls: true,

    build: {
        manifest: false,
        outDir: __dirname + '/theme/build',
        emptyOutDir: false,
        rollupOptions: {
            input: [
                //__dirname + '/resources/quivi/custom_quivi.js',
                __dirname + '/src/theme.js',
            ],

            output: {
                assetFileNames: "[name].[ext]",
                chunkFileNames: "[name].[ext]",
                entryFileNames: "[name].js",
            },

        },
        write: true,
    },

    plugins: [


        /*{
            name: 'reload-theme',
            handleHotUpdate({file, server}) {
                console.log('reloading ??? ...');

                /!*if (file.endsWith('.htm')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }*!/
            },
        },*/

        /*{
            name: 'custom-hmr',
            enforce: 'post',
            // HMR
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.json')) {
                    console.log('reloading json file...');

                    server.ws.send({
                        type: 'full-reload',
                        path: '*'
                    });
                }
            },
        }*/

    ],

/*
    server: {

        proxy: {
            // string shorthand
            '/': 'http://localhost:9021',
        },

        port: 3030

    },

    resolve: {
        alias: {
            //'@': resolve(__dirname, './resources/quivi')
            '@' : '/resources/quivi/'

        }
    }
*/



});
