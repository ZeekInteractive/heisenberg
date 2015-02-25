// Load our plugins
var	gulp		=	require('gulp'),
	sass		=	require('gulp-ruby-sass'),
	notify		=	require('gulp-notify'),
	minifycss	=	require('gulp-minify-css'),
	rename		=	require('gulp-rename');


// Our 'styles' tasks, which handles our sass actions such as compliling and minification

gulp.task('styles', function() {
	return sass('assets/sass/app.scss', {
			style: 'expanded',
			lineNumbers: true 
		})
		.on('error', notify.onError(function(error) {
			return "Error: " + error.message;
		}))
		.pipe(gulp.dest('assets/css')) // Location of our app.css file
		.pipe(rename({suffix: '.min'})) // Create a copy version of our compiled app.css file and name it app.min.css
		.pipe(minifycss({
			keepSpecialComments:0
		})) // Minify our newly copied app.min.css file
		.pipe(gulp.dest('assets/css')) // Save app.min.css onto this directory	
		.pipe(notify({
			message: "Styles task complete!"
		}));
});


// Our default gulp task, which runs 'styles' when a sass file changes.  This is task is executed by typing 'gulp' on the Terminal
gulp.task('default', function() {
	// Watch our sass files
	gulp.watch('assets/sass/**/*.scss', ['styles']);
})
