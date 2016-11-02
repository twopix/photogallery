'use strict';

module.exports = function() {
  $.gulp.task('copy:image', function() {
    return $.gulp.src(['./source/blocks/**/img/*.+(jpg|jpeg|png|gif)','./source/static/images/*.+(jpg|jpeg|png|gif|ico)'], { since: $.gulp.lastRun('copy:image') })
    	.pipe($.gp.imagemin())
    	.pipe($.gp.flatten())
      	.pipe($.gulp.dest($.config.root + '/assets/img'));
  });
};