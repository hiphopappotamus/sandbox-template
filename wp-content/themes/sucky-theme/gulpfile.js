const {series, parallel, dest, src, watch} = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const cleanCSS = require('gulp-clean-css');
const jshint = require('gulp-jshint');

// config file
let cfg = require('./gulpconfig.json'),
    paths = cfg.paths;

/*
 * Compile sass to css
 * exports.sassy = sassy
 * run: gulp sassy
 */
function sassy(done) {
  console.log(`
    =======
    compiled!
    =======
  `);
  return src([
    paths.sass + '/*.scss',
    paths.sass + '/**/_*.scss',
    paths.sass + '/**/*/_*.scss'
  ])
  .pipe(sourcemaps.init({
    loadMaps: true
  }))
  .pipe(sass({
    outputStyle: 'expanded'
  }))
  .pipe(sourcemaps.write(undefined, {
    sourceRoot: null
  }))
  .pipe(dest(paths.css))
  .pipe(browserSync.stream());

  done();
}

/*
 * Minify css files
 * exports.cssMinify = cssMinify
 * (don't run with default or stuff will craysh)
 * run: gulp cssMinify
 */
function cssMinify(done) {
  console.log(`
    =======
    minified!
    =======
  `);
  return src([
    paths.css + '/*.css'
  ])
  .pipe(
    cleanCSS({
      compatibility: '*',
    })
  )
  .pipe(
    plumber({
      errorHandler(err) {
        console.log(err);
        this.emit('end');
      },
    })
  )
  .pipe(
    rename({
      suffix: '.min'
    })
  )
  .pipe(
    sourcemaps.write('./')
  )
  .pipe(
    dest(paths.css)
  );
  done();
}

/*
 * Scripts task
 * exports.scripty = scripty;
 * run: gulp scripty
 */
function scripty(done) {
  console.log(`
    =======
    scripted!
    =======
  `);

  return src(paths.js + '/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(browserSync.stream());

  done();
}

/*
 * Watch js and css files for changes
 * exports.watch = watchFiles;
 * run: gulp watchFiles
 */
function watchFiles(done) {
  watch([
    paths.sass + '/*.scss',
    paths.sass + '/**/_*.scss',
    paths.sass + '/**/*/_*.scss'
  ], sassy);
  watch([
    paths.js + '/custom.js'
  ], scripty);
  done();
}

/*
 * BrowserSync task
 * exports.syncAll = syncAll;
 * run: gulp syncAll
 */
function syncAll(done) {
  console.log(`
    =======
    everything but the kitchen sync!
    =======
  `);
  browserSync.init(cfg.browserSyncOptions);
  done();
}

// function test(done) {
//   console.log('blargh!!');
//   done();
// }

// extra tasks
exports.sassy = sassy;
exports.cssMinify = cssMinify;
exports.scripty = scripty;
exports.watch = watchFiles;
exports.syncAll = syncAll;

// default tasks
exports.default = series(
  watchFiles,
  syncAll
);
