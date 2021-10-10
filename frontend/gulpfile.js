// yarn add cross-env
// yarn add -D gulp
'use strict'
const gulp = require('gulp')

const clean = require('./tasks/clean')
const copy = require('./tasks/copy')
const fonts = require('./tasks/fonts')
const view = require('./tasks/view')
const style = require('./tasks/style')
const scripts = require('./tasks/scripts')
const img = require('./tasks/image')
const { runServe } = require('./tasks/browserSync')

gulp.task('watch', () => {
  gulp.watch(view.path.watch, gulp.series(view.build))
  gulp.watch(style.path.watch(), gulp.series(style.build))
  gulp.watch(scripts.path.watch, gulp.series(scripts.build))
  gulp.watch(img.path.watch, gulp.series(img.build))
})

gulp.task('build:dev', gulp.series(
  clean.build,
  fonts.fonts,
  style.build,
  scripts.build,
  img.build,
  view.build
))

gulp.task('build', gulp.series(
  clean.build,
  fonts.fonts,
  copy.other,
  style.build,
  scripts.build,
  img.build,
  view.build
))

gulp.task('default', gulp.series(
  'build:dev', gulp.parallel('watch', runServe)
))
