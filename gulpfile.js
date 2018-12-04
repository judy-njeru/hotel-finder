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

gulp.task('default', ['homeScss', 'mainScss'], function() {
    gulp.watch(['scss/main.scss', 'scss/partials/*.scss'], ['mainScss']);
    gulp.watch(['scss/home.scss', 'scss/partials/*.scss'], ['homeScss']);
})