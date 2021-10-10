// yarn add -D del
const del = require('del')
const env = require('./env')

function cleanAll () {
  return del(env.outputFolder)
}

function cleanBuild () {
  return del([`${env.outputFolder}/**`, `!${env.outputFolder}/storage`])
}

function cleanStorage () {
  return del(`${env.outputFolder}/storage`)
}

module.exports = {
  all: cleanAll,
  build: cleanBuild,
  storage: cleanStorage
}
