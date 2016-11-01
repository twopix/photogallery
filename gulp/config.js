var pngquant = require('imagemin-pngquant');

module.exports = {
  root: './public',

  clean: [
    './public/css',
    './public/js',
    './public/img'
  ],

  spriteSvgConfig: {
    mode: {
      symbol: {
        dest: './public/',
        sprite: 'img/sprite.svg'
      }
    }
  },

  autoprefixerConfig: ['last 3 version', '> 1%', 'ie 8', 'ie 9', 'Opera 12.1'],

  imageminOptions: {
    progressive: true,
    use: [pngquant()],
    interlaced: true,
    multipass: true
  }
};