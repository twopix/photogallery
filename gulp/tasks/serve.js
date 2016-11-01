'use strict';

module.exports = function() {
  $.gulp.task('serve', function() {
    $.browserSync.init({
      proxy: 'localhost:8000',
      open: false
    });

    $.browserSync.watch([$.config.root + '/**/*.*', '!**/*.css', './resources/views/**/*.*'], $.browserSync.reload);
  });
};
