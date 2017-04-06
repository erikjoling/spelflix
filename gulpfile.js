/* 
 * npm install --save-dev gulp gulp-plumber gulp-rename gulp-concat gulp-sass gulp-autoprefixer gulp-uglify
 */

/* Gulp */
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var concat = require('gulp-concat');

/* CSS */
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

/* Javascript */
var uglify = require('gulp-uglify');
// jshint?

/* Settings */
var dir = {
    build: {
        sass:    './assets/_build/sass/',
        scripts: './assets/_build/js/',
    },
    dist: {
        sass:    './assets/css/',
        scripts: './assets/js/',
    },
};

var files = {
    sass: [ 
            dir.build.sass + '**/*.scss', 
            '!' + dir.build.sass + 'vendors/**/*.scss', // Exclude all vendors
            // dir.build.sass + 'vendors/ejo2017/**/*.scss', // Include EJO vendor
          ],
    scripts: dir.build.scripts + '**/*.js',
};

var browser_support = 'last 2 version'; 

//* Create expanded and minified stylguesheet at the same time (performance is fast using libsass)
//* In case of error, show it only once
gulp.task('sass:run', function () {

    //* Create expanded stylesheet
    gulp.src([dir.build.sass + 'style.scss'])
        .pipe(plumber())
        .pipe(sass({
            outputStyle: 'expanded'
        }))
        .pipe(autoprefixer({ remove: false, browsers:[browser_support] }))
        .pipe(gulp.dest(dir.dist.sass));

    //* Create minified stylesheet
    gulp.src([dir.build.sass + 'style.scss'])
        .pipe(plumber())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(autoprefixer({ remove: false, browsers:[browser_support] }))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(dir.dist.sass));
});

// Scripts
gulp.task('scripts:run', function() {

    // Lint
    gulp.src(files.scripts)
        .pipe(plumber());

    // Concatenate & Minify Scripts
    gulp.src(files.scripts)
        .pipe(plumber())
        .pipe(concat('theme.js'))
        .pipe(gulp.dest(dir.dist.scripts))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(dir.dist.scripts));
});

// Rerun the task when a file changes
gulp.task('sass:watch', function() {
    gulp.watch(files.sass, ['sass:run']);
});

// Watch Files For Changes
gulp.task('scripts:watch', function() {
    gulp.watch( files.scripts, ['scripts:run'] );
});

/**
 * COMMAND LINE TASKS
 */

/* Only Sass */
gulp.task('sass', ['sass:run', 'sass:watch']);

/* Only Scripts */
gulp.task('scripts', ['scripts:run', 'scripts:watch']);

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['sass', 'scripts']);

