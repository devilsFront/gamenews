// yarn add -D webpack-stream @babel/core @babel/preset-env babel-loader
const { src, dest, series } = require('gulp')
const webpack = require('webpack-stream')

const env = require('./env')
const { browserSync } = require('./browserSync')

const path = {
  src: ['assets/scripts/app.js'],
  watch: [
    'assets/scripts/*.js',
    'assets/scripts/import/*.js',
    'assets/scripts/tools/*.js'
  ]
}

function scriptDev () {
  return (
    src(path.src).
      pipe(
        webpack({
          mode: 'development',
          output: {
            filename: `app.js`,
          },
          devtool: 'source-map',
          module: {
            rules: [
              {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                query: { presets: ['@babel/preset-env'] },
              },
            ],
          },
        }),
      ).
      pipe(dest(`${env.outputFolder}/statics`)).
      on('end', () => browserSync.reload('*.js'))
  )
}

function script () {
  return (
    src(path.src).pipe(
      webpack({
        mode: 'production',
        output: {
          filename: `app${env.hash}.js`,
        },
        module: {
          rules: [
            {
              test: /\.js$/,
              exclude: /node_modules/,
              loader: 'babel-loader',
              query: { presets: ['@babel/preset-env'] },
            },
          ],
        },
      }),
    ).pipe(dest(`${env.outputFolder}/statics`))
  )
}

module.exports = {
  build: env.develop ? series(scriptDev) : series(script),
  path,
}
