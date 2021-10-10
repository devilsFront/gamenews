// yarn add -D gulp-cached gulp-header gulp-sass gulp-autoprefixer gulp-remember gulp-concat gulp-group-css-media-queries gulp-clean-css
const { src, dest, series } = require('gulp')
const cache = require('gulp-cached')
const header = require('gulp-header')
const sass = require('gulp-sass')
const autoPrefixer = require('gulp-autoprefixer')
const remember = require('gulp-remember')
const concat = require('gulp-concat')
const gcmq = require('gulp-group-css-media-queries')
const cleanCSS = require('gulp-clean-css')

const env = require('./env')
const { browserSync } = require('./browserSync')

const path = {
  src: ['assets/styles/tools/*.sass', 'assets/styles/import/*.sass'],
  watch () {
    return this.src.concat('assets/styles/*.sass')
  },
}

function styleDev () {
  return src(path.src)
    .pipe(cache('style'))
    .pipe(header('@import "../variables"\n'))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoPrefixer(['last 2 versions', '> 0.7%']))
    .pipe(remember('style'))
    .pipe(concat('style.css'))
    .pipe(gcmq())
    .pipe(dest(`${env.outputFolder}/statics`))
    .on('end', () => browserSync.reload('*.css'))
}

function style () {
  return src(path.src)
    .pipe(header('@import "../variables"\n'))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoPrefixer(['last 2 versions', '> 0.7%']))
    .pipe(concat(`style${env.hash}.css`))
    .pipe(gcmq())
    .pipe(cleanCSS())
    .pipe(dest(`${env.outputFolder}/statics`))
}

module.exports = {
  build: env.develop ? series(styleDev) : series(style),
  path,
}
