var gulp = require('gulp'),
	watch = require('gulp-watch'),
	autoprefixer = require('gulp-autoprefixer'),
	sourcemap = require('gulp-sourcemaps'),
	uglify = require('gulp-uglify'),
	notify = require('gulp-notify'),
	sass = require('gulp-ruby-sass');

gulp.task('sass', function(){
	return sass('sass/style.scss', { sourcemap: true, style: 'compressed'})
			.on('error', function(err) {
				console.error('Error!', err.message);
			})
			.pipe(gulp.dest('.gulp-cache'))
			.pipe(notify({
				title: "Stylesheets",
				message: "SASS Processing Completed",
				sound: true
			}));
});
gulp.task('prefix', function(){
	return gulp.src('./.gulp-cache/style.css')
				.pipe(autoprefixer({
					browsers: ['> 1%', 'last 3 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
				}))
				.pipe(gulp.dest('./'))
				.pipe(notify({
					title: "Prefixing",
					message: "AutoPrefixer Processing Completed",
					sound: true
				}));
});

gulp.task('minifyJS', function(){
	return gulp.src('js/core.mad9scientist.com.js')
				.pipe(uglify())
				.pipe(gulp.dest('js/dist'))
				.pipe(notify({
					title: "Scripts",
					message: "Javascript Minified",
					sound: true
				}));
});

gulp.task('watch', function(){
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch('.gulp-cache/**/*.css', ['prefix']);
	gulp.watch('js/core.mad9scientist.com.js', ['minifyJS']);
});

gulp.task('default', ['watch']);