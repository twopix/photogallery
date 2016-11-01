'use strict';

module.exports = function() {
  $.gulp.task('optimize:sass', function() {
    return $.gulp.src('./resources/assets/style/app.scss')
      .pipe($.gp.sass()).on('error', $.gp.notify.onError({ title: 'Style' }))
      .pipe($.gp.autoprefixer({ browsers: $.config.autoprefixerConfig }))
      .pipe($.gulp.dest($.config.root + '/css/full'))
      .pipe($.gp.csso())
      .pipe($.gulp.dest($.config.root + '/css'))
      .pipe($.browserSync.stream());
  })
};
