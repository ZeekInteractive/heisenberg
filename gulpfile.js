var	gulp	=	require('gulp'),
	sass	=	require('gulp-ruby-sass'),
	notify	=	require('gulp-notify');


// Our 'styles' tasks, which handles our sass actions such as compliling and minification

gulp.task('styles', function() {
	return sass('assets/sass/app.scss', {
			style: 'expanded',
			lineNumbers: true 
		})
		.on('error', notify.onError(function(error) {
			return "Error: " + error.message;
		}))
		.pipe(gulp.dest('assets/css'))
		.pipe(notify({
			message: "Styles task complete!"
		}));
});


gulp.task('default', function() {
	// Watch our sass files
	gulp.watch('assets/sass/**/*.scss', ['styles']);
})
