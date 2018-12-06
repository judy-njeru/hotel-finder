const gulp = require('gulp');
const sass = require('gulp-sass');

gulp.task('homeScss', function() {
    return gulp.src('scss/home.scss')
    .pipe(sass())
    .pipe(gulp.dest('css'));
})

gulp.task('mainScss', function() {
    return gulp.src('scss/main.scss')
    .pipe(sass())
    .pipe(gulp.dest('css'));
})

gulp.task('hotelsScss', function() {
    return gulp.src('scss/hotels.scss')
    .pipe(sass())
    .pipe(gulp.dest('css'));
})

gulp.task('watch', ['homeScss', 'mainScss', 'hotelsScss'], function() {
    gulp.watch(['scss/main.scss', 'scss/partials/*.scss'], ['mainScss']);
    gulp.watch(['scss/home.scss', 'scss/partials/*.scss'], ['homeScss']);
    gulp.watch(['scss/hotels.scss', 'scss/partials/*.scss'], ['hotelsScss']);
})