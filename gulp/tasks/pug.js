'use strict';

module.exports = function() {
  $.gulp.task('pug', function() {
    return $.gulp.src('./source/pages/*.pug')
      .pipe($.gp.pug({ locals: $.config.content, pretty: true }))
      .on('error', $.gp.notify.onError(function(error) {
        return {
          title: 'Pug',
          message:  error.message
        }
       }))
      .pipe($.gulp.dest($.config.root));
  });
};
