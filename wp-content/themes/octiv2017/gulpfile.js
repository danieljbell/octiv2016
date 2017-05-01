var gulp          = require('gulp'),
    postcss       = require('gulp-postcss'),
    sass          = require('gulp-sass'),
    sourcemaps    = require('gulp-sourcemaps'),
    atImport      = require('postcss-import'),
    autoprefixer  = require('autoprefixer'),
    mqpacker      = require('css-mqpacker'),
    cssnano       = require('cssnano'),
    imagemin      = require('gulp-imagemin'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify'),
    pump          = require('pump'),
    browserSync   = require('browser-sync'),
    clean = require('gulp-clean');

gulp.task('css', function () {
  var processors = [
    atImport,
    autoprefixer({browsers: ['last 6 versions']}),
    mqpacker,
    cssnano
  ];
  gulp.src('./dist/css/**/*', {read: false})
    .pipe(clean());
  gulp.src('./src/css/*.css')
    .pipe(gulp.dest('./dist/css'))
    .pipe(browserSync.stream());
  gulp.src('./src/scss/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/css/global.css'))
    .pipe(browserSync.stream());
});

gulp.task('js', function () {
  gulp.src('./dist/js/**/*', {read: false})
    .pipe(clean());
  gulp.src([
    'src/js/global.js'
  ])
    .pipe(sourcemaps.init())
    .pipe(concat('global.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
});

gulp.task('images', function() {
  gulp.src('src/img/*')
      .pipe(gulp.dest('dist/img'))
});

gulp.task('watch', function() {
  gulp.watch('src/scss/**/*.scss', ['css']);
  gulp.watch('src/css/*.css', ['css']);
  gulp.watch('src/js/*.js', ['js']);
  gulp.watch('src/img/*.{png,jpg,gif,svg}', ['images']).on('change', browserSync.reload);
  gulp.watch(['*.php', 'page-templates/*.php',  'partials/*.php']).on('change', browserSync.reload);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:1337"
    });
});

gulp.task('default', ['watch', 'browser-sync']);