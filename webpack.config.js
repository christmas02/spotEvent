const { VueLoaderPlugin } = require("vue-loader");
const path = require("path");

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
                        loader: "file-loader"
                    },
                    {
                        loader: "url-loader"
                    }
                ]
            }
        ]
    }
};
