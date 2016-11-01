'use strict';

module.exports = function() {
  $.gulp.task('optimize:image', function() {
    return $.gulp.src(['./resources/assets/images/**/*.*', '!./resources/assets/images/sprite/**/*.*'], { since: $.gulp.lastRun('optimize:image') })
      .pipe($.gp.imagemin($.config.imageminOptions))
      .pipe($.gulp.dest($.config.root + '/img'));
  });
};
