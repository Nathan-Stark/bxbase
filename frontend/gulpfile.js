const gulp = require('gulp');

var less = require('gulp-less');
var path = require('path');
var csso = require('gulp-csso');

gulp.task('less', function () {
	return gulp.src('./less/*.less')
		.pipe(less({
			paths: [ path.join(__dirname, 'less', 'includes') ]
		}))
		.pipe(csso())
		.pipe(gulp.dest('./../web/local/templates/main/'));
});
gulp.watch('/frontend/less/*.less',function () {
	gulp.run("less");
});