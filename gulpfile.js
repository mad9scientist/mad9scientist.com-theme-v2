var gulp = require('gulp'),
	watch = require('gulp-watch'),
	autoprefixer = require('gulp-autoprefixer'),
	sourcemap = require('gulp-sourcemaps'),
	uglify = require('gulp-uglify'),
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
					browsers: ['> 1%', 'last 3 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
				}))
				.pipe(gulp.dest('./'));
});

gulp.task('minifyJS', function(){
	return gulp.src('js/core.mad9scientist.com.js')
				.pipe(uglify())
				.pipe(gulp.dest('js/dist'))
});

gulp.task('watch', function(){
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch('.gulp-cache/**/*.css', ['prefix']);
	gulp.watch('js/core.mad9scientist.com.js', ['minifyJS']);
});

gulp.task('default', ['watch']);