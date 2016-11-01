'use strict';

module.exports = function() {
  $.gulp.task('copy:image', function() {
    return $.gulp.src(['./resources/assets/images/**/*.*', '!./resources/assets/images/sprite/**/*.*'], { since: $.gulp.lastRun('copy:image') })
      .pipe($.gulp.dest($.config.root + '/img'));
  });
};
