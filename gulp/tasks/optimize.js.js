'use strict';

module.exports = function () {
  $.gulp.task('optimize:js', function () {
    return $.gulp.src($.path.app)
      .pipe($.gp.browserify())
      .pipe($.gulp.dest($.config.root + '/js/full'))
      .pipe($.gp.uglify())
      .pipe($.gulp.dest($.config.root + '/js'))
  })
};