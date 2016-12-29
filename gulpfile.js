// Packages
var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify'),
    autoprefixer = require('gulp-autoprefixer'),
    path         = require('path'),
    rev          = require('gulp-rev');

// Config

var basePaths = {
      src: 'resources/',
      dest: 'web/assets/',
      bower: 'vendor/bower_components/'
    };

var input  = {
      sass: basePaths.src + 'scss/*.scss'
    },
    output = {
      css: basePaths.dest + 'css'
    };

var vendorFiles = {
    photoswipe: {
        path: [
            basePaths.bower + 'photoswipe/dist/'
        ],
        styles: [
            basePaths.bower + 'photoswipe/dist/photoswipe.css',
            basePaths.bower + 'photoswipe/dist/default-skin/default-skin.css'
        ],
        scripts: [
            basePaths.bower + 'photoswipe/dist/photoswipe.js',
            basePaths.bower + 'photoswipe/dist/photoswipe-ui-default.js'
        ]
    },
    fontawesome: [
        basePaths.bower + 'font-awesome/'
    ]
};

/*
 *  Default
 */
gulp.task('default', ['build-css', 'vendor']);

/*
 * Compile SASS
 */
gulp.task('build-css', function() {
    var sassOptions = {
      errLogToConsole: true,
      outputStyle: 'compressed'
    };
    return gulp.src(input.sass)
        .pipe(concat('style.css'))
        .pipe(sass(sassOptions))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        })).pipe(rev())
        .pipe(gulp.dest(output.css))
        .pipe(rev.manifest())
        .pipe(gulp.dest(output.css));
});

/*
*  process vendor assets
*/
gulp.task('vendor', function() {

    // copy FontAwesome

    var faOutput = basePaths.dest + 'vendor/fontawesome';

    gulp.src(vendorFiles.fontawesome + 'css/font-awesome.min.css')
        .pipe(gulp.dest(faOutput + '/css'));

    gulp.src(vendorFiles.fontawesome + 'fonts/*')
        .pipe(gulp.dest(faOutput + '/fonts'));


    // combine PhotoSwipe

    var psOutput = basePaths.dest + 'vendor/photoswipe';

    var sassOptions = {
      errLogToConsole: true,
      outputStyle: 'compressed'
    };

    gulp.src(vendorFiles.photoswipe.styles)
        .pipe(concat('xphotoswipe.css'))
        .pipe(sass(sassOptions))
        .pipe(gulp.dest(psOutput));

    gulp.src(vendorFiles.photoswipe.scripts)
        .pipe(concat('xphotoswipe.js'))
        .pipe(uglify())
        .pipe(gulp.dest(psOutput));

    gulp.src(vendorFiles.photoswipe.path + 'default-skin/*')
        .pipe(gulp.dest(psOutput));

});
