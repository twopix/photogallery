'use strict';

module.exports = function() {
  $.gulp.task('js:process', function() {
    return $.gulp.src($.path.app)
      .pipe($.gp.sourcemaps.init())
      .pipe($.gp.browserify()).on('error', $.gp.notify.onError({ title: 'JS' }))
      .pipe($.gp.sourcemaps.write())
      .pipe($.gulp.dest($.config.root + '/js'))
  })
};
