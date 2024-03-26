"use strict";

// Local domain name
const domainName = 'wordpress-theme'; // Change to your local domain name

// Load plugins
const gulp = require('gulp'),
    merge = require('merge-stream'),
    sass = require('gulp-sass')(require('sass')),
    del = require('del'),
    uglify = require('gulp-uglify'),
    cleanCSS = require('gulp-clean-css'),
    rename = require("gulp-rename"),
    replace = require('gulp-html-replace'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    browserSync = require('browser-sync').create();

// Paths
const componentsJsPath = 'assets/js/components/*.js';
const scriptsJsPath = 'assets/js'; // folder for final scripts.js/scripts.min.js files

//
gulp.task('clean', function () {
    return del(['dist']);
});

// Copy third party libraries from node_modules into /vendor
gulp.task('vendor:js', function () {
    return gulp.src([
        './node_modules/bootstrap/dist/js/*',
        "./node_modules/@popperjs/core/dist/umd/popper.*"
    ])
        .pipe(gulp.dest('./assets/js/vendor'));
});

// Copy bootstrap-icons from node_modules into /fonts
gulp.task('vendor:fonts', function () {
    return gulp.src([
        './node_modules/bootstrap-icons/**/*',
        '!./node_modules/bootstrap-icons/package.json',
        '!./node_modules/bootstrap-icons/README.md',
    ])
        .pipe(gulp.dest('./assets/fonts/bootstrap-icons'))
});

// vendor's js to production
gulp.task('vendor:build', function () {
    const jsStream = gulp.src([
        './assets/js/vendor/bootstrap.bundle.min.js',
        './assets/js/vendor/popper.min.js'
    ], {allowEmpty: true});
    return merge(jsStream);
})

// vendor task
gulp.task('vendor', gulp.parallel('vendor:fonts', 'vendor:js', 'vendor:build'));

// Copy Bootstrap SCSS(SASS) from node_modules to /assets/scss/bootstrap
gulp.task('bootstrap:scss', function () {
    return gulp.src(['./node_modules/bootstrap/scss/**/*'])
        .pipe(gulp.dest('./assets/scss/bootstrap'));
});

// Compile SCSS(SASS) files
gulp.task('scss', function compileScss() {
    return gulp.src(['./assets/scss/*.scss'])
        .pipe(sass.sync({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./assets/css'))
});

// Minify CSS
gulp.task('css:minify', gulp.series('scss', function cssMinify() {
    return gulp.src("./assets/css/*.css", { ignore: "./assets/css/*.min.css" }) // Ignore already minified files
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./assets/css'))
        .pipe(browserSync.stream());
}));

// Compile JS for dev
gulp.task('js', function () {
    return gulp.src([componentsJsPath])
        .pipe(concat('app.js'))
        .pipe(gulp.dest(scriptsJsPath))
        .pipe(browserSync.stream());
});

// Minify JS
gulp.task('js:minify', function () {
    return gulp.src([
        './assets/js/app.js'
    ])
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./assets/js'))
        .pipe(browserSync.stream());
});

// Replace HTML block for Js and Css file to min version upon build and copy to /dist
gulp.task('replace', function () {
    return gulp.src(['*.html'])
        .pipe(replace({
            'js': 'assets/js/app.min.js',
            'css': 'assets/css/app.min.css'
        }))
        .pipe(gulp.dest('dist/'));
});

// Configure the browserSync task and watch file path for change
gulp.task('dev', function browserDev(done) {
    browserSync.init({
        // use if HTTPS is on
        // proxy: 'https://' + domainName + '.test', // uncomment if HTTPS is turned on
        // https: {
        //     key: "C:\\Users\\yourName\\AppData\\Roaming\\Local\\run\\router\\nginx\\certs\\wordpress-theme.test.key",
        //     cert: "C:\\Users\\yourName\\AppData\\Roaming\\Local\\run\\router\\nginx\\certs\\wordpress-theme.test.crt",
        // },
        proxy: 'https://' + domainName + '.test', // remove if HTTPS is on
        host: domainName + '.test',
        open: "external",
        port: 3000,
        notify: false,
        cache: false, // Disable cache
        snippetOptions: {
            rule: {
                match: /<\/head>/i,
                fn: function (snippet, match) {
                    return snippet + match;
                }
            }
        }
    });
    gulp.watch(['!assets/scss/bootstrap/**', 'assets/scss/*.scss', 'assets/scss/**/*.scss'], gulp.series('scss', function cssBrowserReload(done) {
        browserSync.reload();
        done(); //Async callback for completion.
    }));
    gulp.watch('assets/js/components/*.js', gulp.series('js', function jsBrowserReload(done) {
        browserSync.reload();
        done();
    }));

    gulp.watch('**/*.php').on('change', function phpBrowserReload() {
        browserSync.reload();
    });

    done();
});

// Starts the development environment and moves the bootstrap and vendor files to the /assets folder
gulp.task("start", gulp.series('bootstrap:scss', 'vendor', 'scss', 'js'));
// Build task
gulp.task("build", gulp.series('css:minify', 'js:minify'));
// Default task
gulp.task("default", gulp.series('start', "clean", 'build', 'replace'));
