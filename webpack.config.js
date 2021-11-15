const { VueLoaderPlugin } = require("vue-loader");
const path = require("path");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

module.exports = {
    mode: "development",
    plugins: [new VueLoaderPlugin()],
    entry: path.resolve(__dirname, "resources/client/src/main.ts"),
    output: {
        path: path.resolve(__dirname, "public/js"),
        filename: "main.js"
    },
    resolve: {
        extensions: [".ts", ".vue", ".js", ".css"],
        alias: {
            "@": path.resolve(__dirname, "resources/client/src")
        }
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: "vue-loader"
            },
            // {
            //     test: /\.tsx?$/,
            //     loader: "ts-loader",
            //     exclude: /node_modules/,
            //     options: {
            //         appendTsSuffixTo: [/\.vue$/]
            //     }
            // },
            // this will apply to both plain `.js` files
            // AND `<script>` blocks in `.vue` files
            {
                exclude: /node_modules/,
                test: /\.(js|ts)$/,
                loader: "babel-loader"
            },
            // this will apply to both plain `.css` files
            // AND `<style>` blocks in `.vue` files
            {
                test: /\.css$/,
                use: ["vue-style-loader", "css-loader"]
            },
            {
                test: /\.(png|jpe?g|gif)$/i,
                use: [
                    {
                        loader: "url-loader",
                        options: {
                            limit: 8192
                        }
                    }
                ]
            }
        ]
    }
};
