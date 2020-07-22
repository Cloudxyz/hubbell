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

// public styles mix
mix.combine(
    [
        "public/assets/public/css/bootstrap.min.css",
        "public/assets/public/css/animate.css",
        "public/assets/public/css/font-awesome.css",
        "public/assets/public/css/themify-icons.css",
        "public/assets/public/revolution/css/layers.css",
        "public/assets/public/revolution/css/settings.css",
        "public/assets/public/css/magnific-popup.css",
        "public/assets/public/css/megamenu.css",
        "public/assets/public/css/shortcodes.css",
        "public/assets/public/css/main.css",
        "public/assets/public/css/responsive.css",
        "public/assets/public/css/custom.css"
    ],
    "public/assets/public/css/public.css"
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

// public scripts mix
mix.combine(
    [
        "public/assets/public/js/jquery.min.js",
        "public/assets/public/js/tether.min.js",
        "public/assets/public/js/bootstrap.min.js",
        "public/assets/public/js/jquery.easing.js",
        "public/assets/public/js/jquery-waypoints.js",
        "public/assets/public/js/jquery-validate.js",
        "public/assets/public/js/numinate.min.js",
        "public/assets/public/js/slick.js",
        "public/assets/public/js/jquery.magnific-popup.min.js",
        "public/assets/public/js/price_range_script.js",
        "public/assets/public/js/easyzoom.js",
        "public/assets/public/revolution/js/jquery.themepunch.tools.min.js",
        "public/assets/public/revolution/js/jquery.themepunch.revolution.min.js",
        "public/assets/public/revolution/js/slider.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.actions.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.carousel.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.kenburn.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.layeranimation.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.migration.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.navigation.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.parallax.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.slideanims.min.js",
        "public/assets/public/revolution/js/extensions/revolution.extension.video.min.js"
    ],
    "public/assets/js/common-public-script.js"
);

// scripts minimize
mix.js(["resources/gull/assets/js/script.js"], "public/assets/js/script.js");
