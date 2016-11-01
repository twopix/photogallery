'use strict';

module.exports = function() {
  $.gulp.task('js:foundation', function() {
    return $.gulp.src($.path.jsFoundation)
      .pipe($.gp.sourcemaps.init())
      .pipe($.gp.concat('foundation.js'))
      .pipe($.gp.uglify())
      .pipe($.gp.sourcemaps.write())
      .pipe($.gulp.dest($.config.root + '/js'))
  })
};
