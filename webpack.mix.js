const mix = require('laravel-mix');

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


// files mixes
mix.react("resources/js/app.js", "public/js");
mix.js("resources/js/scripts.js", "public/js/scripts.js");
mix.sass("resources/sass/app.scss", "public/css");
mix.sass(
    "resources/gull/assets/styles/sass/themes/hubbell.scss",
    "public/assets/styles/css/themes/hubbell.min.css"
);

// vendor styles mix
mix.combine(
    [
        "public/assets/styles/vendor/perfect-scrollbar.css",
        "public/assets/styles/vendor/fastselect.min.css",
        "public/assets/styles/vendor/dropzone.min.css",
        "public/assets/styles/vendor/jquery-ui.min.css"
    ],
    "public/css/vendor.css"
);

// vendor scripts mix
mix.combine(
    [
        "resources/gull/assets/js/vendor/jquery-3.3.1.min.js",
        "resources/gull/assets/js/vendor/jquery-ui.min.js",
        "resources/gull/assets/js/vendor/bootstrap.bundle.min.js",
        "resources/gull/assets/js/vendor/perfect-scrollbar.min.js",
        "public/assets/js/vendor/fastselect.standalone.js",
        "public/assets/js/vendor/dropzone.min.js"
    ],
    "public/assets/js/common-bundle-script.js"
);

// scripts minimize
mix.js(["resources/gull/assets/js/script.js"], "public/assets/js/script.js");
