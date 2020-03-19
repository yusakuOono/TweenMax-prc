const gulp = require("gulp");
const sass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
const plumber = require("gulp-plumber");
const cleancss = require ("gulp-clean-css");
const sourcemaps = require('gulp-sourcemaps');
const connect = require('gulp-connect-php');

const webpackstream = require("webpack-stream");
const webpack = require("webpack");

// webpack setting
const webpackConfig = require("./webpack.config");

gulp.task('sass', done => {
    gulp.src("src/scss/**/*.scss")
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cleancss())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest("./dist/css"))
		done()
});

gulp.task("js", done => {
    return webpackstream(webpackConfig, webpack)
    .on('error', function handleError() {
        this.emit('end'); // Recover from errors
    })
    .pipe(gulp.dest("./dist/js"))
    done()
});

gulp.task('connect', done => {
    connect.server({
		port:8001,
		//bin: 'C:/xampp/php/php.exe',
		//ini: 'C:/xampp/php/php.ini'
	});
	done()
});


gulp.task('watch', () => {
	gulp.watch('src/scss/**/*.scss', gulp.series('sass','logSass'))
	gulp.watch('src/js/**/*.js', gulp.series('js','logJs'));
});


gulp.task('logSass', done => {
	console.log("sass was successful.")
	done()
});

gulp.task('logJs', done => {
	console.log("javascript was successful.")
	done()
});

gulp.task("default",gulp.series(gulp.parallel('watch','connect')));
