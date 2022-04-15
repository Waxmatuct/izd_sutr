const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/main.js", "public/js")
    .sourceMaps()
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ]);

if (mix.inProduction()) {
    mix.version();
} else {
    mix.browserSync({
        proxy: "izd.test",
        files: [
            "app/**/*.php",
            "resources/views/**/*.php",
            "resources/js/app.js",
            "resources/js/components/*.vue",
            "public/js/**/*.js",
            "public/css/**/*.css",
        ],
        // browser: "firefox",
        host: "izd.test",
        port: 3000,
        open: false,
        watchOptions: {
            usePolling: true,
            interval: 500,
            poll: true,
            ignored: /node_modules/,
        },
        logSnippet: true,
    });
}

mix.webpackConfig({
    output: {
        chunkFilename: "js/vuejs_code_split/[name].js",
    },
});
