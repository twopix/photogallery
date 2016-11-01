'use strict';

module.exports = function() {
  $.gulp.task('watch', function() {
    $.gulp.watch('./resources/assets/js/**/*.js', $.gulp.series('js:process'));
    $.gulp.watch('./resources/assets/style/**/*.scss', $.gulp.series('sass'));
    $.gulp.watch('./resources/assets/images/**/*.*', $.gulp.series('copy:image'));
    $.gulp.watch('./resources/assets/images/sprites/**/*.svg', $.gulp.series('sprite:svg'));
  });
};
