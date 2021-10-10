const { src, dest } = require('gulp')

const env = require('./env')

function fonts () {
  if (!env.develop) {
    return src('assets/fonts/*.*')
      .pipe(dest(`${env.pathProd}/fonts`))
  }
  return src('assets/fonts/*.*')
    .pipe(dest(`${env.pathDev}/fonts`))
}

module.exports = {
  fonts: fonts
}
