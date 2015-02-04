var gulp = require('gulp'),
	watch = require('gulp-watch'),
	autoprefixer = require('gulp-autoprefixer'),
	sass = require('gulp-ruby-sass');

gulp.task('sass', function(){
	return sass('sass/style.scss', { sourcemap: true, style: 'compressed'})
			.on('error', function(err) {
				console.error('Error!', err.message);
			})
			.pipe(gulp.dest('.gulp-cache'));
});
gulp.task('prefix', function(){
	return gulp.src('.gulp-cache/style.css')
				.pipe(autoprefixer({
					browsers: ['> 1%', 'last 3 versions', 'Firefox ESR', 'Opera 12.1']
				}))
				.pipe(gulp.dest('./'));
});

gulp.task('watch', function(){
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch('.gulp-cache/**/*.css', ['prefix']);
});

gulp.task('default', ['watch']);