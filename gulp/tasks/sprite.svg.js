'use strict';

module.exports = function () {
  $.gulp.task('sprite:svg', function () {
    return $.gulp.src('./resources/assets/images/sprites/**/*.svg')
      .pipe($.gp.svgmin({
        plugins: [
          {
            removeAttrs: {
              attrs: [
                'fill',
                'stroke',
                'stroke-width',
                'style'
              ]
            }
          }
        ]
      }))
      .pipe($.gp.svgSprite($.config.spriteSvgConfig))
      .pipe($.gulp.dest('./'));
  });
};