'use strict';

module.exports = function () {
  $.gulp.task('clean', function (cb) {
    const options = {
      ignoreMissing: true
    };

    $.remove.removeSync($.config.clean, options);

    cb();
  });
};
