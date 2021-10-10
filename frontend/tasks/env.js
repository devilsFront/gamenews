const develop = process.env.NODE_ENV === 'develop';
const production = process.env.NODE_ENV === 'production';
const hash = Math.floor(Math.random() * 10000000);

module.exports = {
  develop,
  production,
  hash,
  outputFolder: develop ? 'dev' : 'public',
  pathDev: 'dev/statics',
  pathProd: 'public/statics',
};
