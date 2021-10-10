// yarn add -D gulp-json-minify
const { src, dest, series } = require('gulp')
const env = require('./env')

function htaccess () {
  return src('assets/files/.htaccess')
    .pipe(dest(`${env.outputFolder}`))
}

function robots () {
  return src('assets/files/robots.txt')
    .pipe(dest(`${env.outputFolder}`))
}

module.exports = {
  other: series(htaccess, robots),
}
