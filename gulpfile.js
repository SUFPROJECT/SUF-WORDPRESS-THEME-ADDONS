//http://flaton2.demo.towerthemes.com/
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    rename = require('gulp-rename'),
    del = require('del');
var sourcemaps = require('gulp-sourcemaps');
var outputDir = './assets/css/',
    jsoutputDir = './assets/js/',
    sassDir = './assets/scss/';

gulp.task('sass', function () {
    return gulp.src([
        sassDir + 'homepage-newslist-table.scss',
        sassDir + 'company-outlines.scss',
    ])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(outputDir + ''));
});
gulp.task('default', function () {
    gulp.start('sass');
});
