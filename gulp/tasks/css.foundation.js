'use strict';

module.exports = function() {
  $.gulp.task('css:foundation', function(cb) {
  	if($.path.cssFoundation.length === 0) return cb();
    return $.gulp.src($.path.cssFoundation)
      .pipe($.gp.concatCss('foundation.css'))
      .pipe($.gp.csso())
      .pipe($.gulp.dest($.config.root + '/assets/css'))
  })
};
