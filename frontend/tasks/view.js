// yarn add -D gulp-pug gulp-data gulp-plumber gulp-typograf gulp-htmlmin gulp-header gulp-rename
const { src, dest, series } = require('gulp')
const pug = require('gulp-pug')
const plumber = require('gulp-plumber')
const data = require("gulp-data")
const typograf = require('gulp-typograf')
const htmlmin = require('gulp-htmlmin')
const header = require('gulp-header')
const rename = require('gulp-rename')

const env = require('./env')
const { browserSync } = require('./browserSync')
const path = {
  pages: 'assets/views/pages/*.pug',
  watch: 'assets/views/**/*.pug',
  error: 'assets/views/pages/404.pug',
  siteMap: 'assets/views/pages/_site-map.pug',
}

function viewDev () {
  return src(path.pages)
    .pipe(plumber())
    .pipe(pug({
      pretty: true,
      data: {
        develop: true
      }
    }))
    // .pipe(typograf({
    //   locale: ['ru', 'en-US'],
    //   safeTags: [
    //     ['<no-tpg>', '</no-tpg>']
    //   ],
    // }))
    .pipe(dest('dev'))
    .on('end', browserSync.reload)
}

function view () {
  return src([path.pages, `!${path.error}`, `!${path.siteMap}`])
    .pipe(plumber())
    .pipe(pug({ data: { hash: env.hash } }))
    // .pipe(typograf({
    //   locale: ['ru', 'en-US'],
    //   safeTags: [
    //     ['<no-tpg>', '</no-tpg>']
    //   ],
    // }))
    .pipe(htmlmin({ collapseWhitespace: true, minifyJS: true }))
    .pipe(dest(env.outputFolder))
}

// function error () {
//   return src(path.error)
//     .pipe(plumber())
//     .pipe(data(file => {
//       return { VIEW: file.stem }
//     }))
//     .pipe(pug({ data: { hash: env.hash } }))
//     // .pipe(typograf({
//     //   locale: ['ru', 'en-US'],
//     //   safeTags: [
//     //     ['<no-tpg>', '</no-tpg>']
//     //   ]
//     // }))
//     .pipe(header('<?php header($_SERVER[\'SERVER_PROTOCOL\']." 404 Not Found");?>'))
//     .pipe(rename({ extname: '.php' }))
//     .pipe(htmlmin({ collapseWhitespace: true, minifyJS: true }))
//     .pipe(dest(env.outputFolder))
// }

function siteMap () {
  return src(path.siteMap)
    .pipe(plumber())
    .pipe(pug())
    .pipe(rename({
      basename: 'sitemap',
      extname: ".xml"
    }))
    .pipe(dest(env.outputFolder))
}

module.exports = {
  build: env.develop ? series(viewDev) : series(view, siteMap),
  path
}
