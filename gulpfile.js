var	gulp	=	require('gulp'),
	sass	=	require('gulp-ruby-sass');


// Our 'styles' tasks, which handles our sass actions such as compliling and minification

gulp.task('styles', function() {
	return sass('assets/sass/app.scss', {
			style: 'expanded',
			lineNumbers: true 
		})
		.pipe(gulp.dest('assets/css'));
});


gulp.task('default', function() {
	// Watch our sass files
	gulp.watch('assets/sass/**/*.scss', ['styles']);
})
