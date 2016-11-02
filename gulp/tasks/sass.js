'use strict';

module.exports = function() {
  $.gulp.task('sass', function() {
    return $.gulp.src(['./source/app.scss'])
      .pipe($.gp.sassGlob())
      .pipe($.gp.sourcemaps.init())
      .pipe($.gp.sass({
        includePaths: [
          './bower_components/normalize-scss/sass/',
          './bower_components/breakpoint-sass/stylesheets/'
        ],
        outputStyle: 'expanded'
      })).on('error', $.gp.notify.onError({ title: 'Style' }))
      .pipe($.gp.autoprefixer({ browsers: $.config.autoprefixerConfig}))
      .pipe($.gp.sourcemaps.write())
      .pipe($.gulp.dest($.config.root + '/assets/css'))
      .pipe($.browserSync.stream());
  })
};
