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
    autoprefixer({browsers: ['last 6 versions', 'ie 9', 'ie 10', 'ie 11']}),
    mqpacker,
    cssnano
  ];
  gulp.src('./src/css/*.css')
    .pipe(gulp.dest('./dist/css'))
    .pipe(browserSync.stream());
  gulp.src('./src/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/css'))
    .pipe(browserSync.stream());
});

gulp.task('js', function () {
  gulp.src([
    './node_modules/jquery/dist/jquery.min.js',
    './node_modules/slick-carousel/slick/slick.js',
    './node_modules/typed.js/lib/typed.min.js',
    './node_modules/bootstrap-sass/assets/javascripts/bootstrap/modal.js',
    './node_modules/sticky-sidebar/dist/sticky-sidebar.min.js',
    'src/js/global.js'
  ])
    // .pipe(sourcemaps.init())
    .pipe(concat('global.js'))
    // .pipe(uglify())
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
  gulp.src([
    'src/js/pages/*.js'
  ])
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
  gulp.src('./node_modules/vue/dist/vue.js')
    .pipe(gulp.dest('./dist/js/lib'))
});

gulp.task('images', function() {
  gulp.src('src/img/*')
      .pipe(gulp.dest('dist/img'))
});

gulp.task('watch', function() {
  gulp.watch('src/scss/**/*.scss', ['css']);
  gulp.watch('src/css/*.css', ['css']);
  gulp.watch('src/js/**/*.js', ['js']);
  gulp.watch('src/img/*.{png,jpg,gif,svg}', ['images']).on('change', browserSync.reload);
  gulp.watch(['*.php', 'page-templates/*.php',  'partials/**/*.php', '../../mu-plugins/shortcodes-v3.php']).on('change', browserSync.reload);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888"
    });
});

gulp.task('default', ['css', 'js', 'watch', 'browser-sync']);