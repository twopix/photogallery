'use strict';

module.exports = function() {
	$.gulp.task('js:process', function() {
	return $.gulp.src('./source/blocks/**/*.js')
		.pipe($.gp.sourcemaps.init())
		.pipe($.gp.concat('app.js'))
		.pipe($.gp.wrapJs('\'use strict\';\n%= body %'))
		.pipe($.gp.sourcemaps.write())
		.pipe($.gulp.dest($.config.root + '/assets/js'))
	})
};
