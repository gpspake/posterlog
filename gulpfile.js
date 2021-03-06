var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function () {

    gulp.src("vendor/bower_components/jquery/dist/jquery.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_components/foundation/scss/**")
        .pipe(gulp.dest("resources/assets/sass/foundation"));

    gulp.src("vendor/bower_components/foundation/js/foundation.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_components/foundation/js/vendor/modernizr.js")
        .pipe(gulp.dest("resources/assets/js/"));

    //copy fontawesome
    gulp.src("vendor/bower_components/font-awesome/scss/**")
        .pipe(gulp.dest("resources/assets/sass/fontawesome"));

    gulp.src("vendor/bower_components/font-awesome/fonts/**")
        .pipe(gulp.dest("public/assets/fonts"));

    // Copy datatables
    var dtDir = 'vendor/bower_components/datatables-plugins/integration/';

    gulp.src("vendor/bower_components/datatables/media/js/jquery.dataTables.js")
        .pipe(gulp.dest('resources/assets/js/'));

    gulp.src(dtDir + 'foundation/dataTables.dataTables.foundation.css')
        .pipe(rename('dataTables.foundation.scss'))
        .pipe(gulp.dest('resources/assets/sass/others/'));

    gulp.src(dtDir + 'foundation/dataTables.foundation.js')
        .pipe(gulp.dest('resources/assets/js/'));

    // Copy masonry
    gulp.src("vendor/bower_components/masonry/dist/masonry.pkgd.js")
        .pipe(gulp.dest('resources/assets/js/'));

    // Copy imagesloaded
    gulp.src("vendor/bower_components/imagesloaded/imagesloaded.pkgd.js")
        .pipe(gulp.dest('resources/assets/js/'));

    // Copy selectize
    gulp.src("vendor/bower_components/selectize/dist/css/**")
        .pipe(gulp.dest("public/assets/selectize/css"));

    gulp.src("vendor/bower_components/selectize/dist/js/standalone/selectize.min.js")
        .pipe(gulp.dest("public/assets/selectize/"));

    // Copy pickadate
    gulp.src("vendor/bower_components/pickadate/lib/compressed/themes/**")
        .pipe(gulp.dest("public/assets/pickadate/themes/"));

    gulp.src("vendor/bower_components/pickadate/lib/compressed/picker.js")
        .pipe(gulp.dest("public/assets/pickadate/"));

    gulp.src("vendor/bower_components/pickadate/lib/compressed/picker.date.js")
        .pipe(gulp.dest("public/assets/pickadate/"));

    gulp.src("vendor/bower_components/pickadate/lib/compressed/picker.time.js")
        .pipe(gulp.dest("public/assets/pickadate/"));
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    // Combine scripts
    mix.scripts([
            'js/modernizr.js',
            'js/jquery.js',
            'js/foundation.js',
            'js/jquery.dataTables.js',
            'js/dataTables.foundation.js',
            'js/imagesloaded.pkgd.js',
            'js/masonry.pkgd.js'
        ],
        'public/assets/js/admin.js',
        'resources/assets'
    );

    // Compile Less
    mix.sass('admin.scss', 'public/assets/css/admin.css');
});
