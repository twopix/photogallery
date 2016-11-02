'use strict';

module.exports = function() {
  $.gulp.task('sprite:png', function() {
    var spriteData = $.gulp.src('./source/blocks/**/sprite/*.png')
      .pipe($.gp.spritesmith({
        imgName: 'sprite.png',
        imgPath: '../img/sprite.png',
        cssName: '_sprite.scss'
      }));

    var imgStream = spriteData.img
      .pipe($.buffer())
      .pipe($.gp.imagemin({use: [$.optPNG()]}))
      // .pipe($.gp.tinypng('api_key'))
      .pipe($.gulp.dest($.config.root + '/assets/img'));
    
    var cssStream = spriteData.css
      .pipe($.gulp.dest('./source/common/sass/mixins'));

    return $.merge(imgStream, cssStream);
  })
};