// Load our plugins
var	gulp			= require('gulp'),
	sass			= require('gulp-sass'),  // Our sass compiler
	notify			= require('gulp-notify'), // Basic gulp notificatin using OS
	sourcemaps		= require('gulp-sourcemaps'), // Sass sourcemaps
	autoprefixer		= require('gulp-autoprefixer'), // Adds vendor prefixes for us
	svgSprite				= require('gulp-svg-sprite'),
	size					= require('gulp-size'),
	browserSync		= require('browser-sync'), // Sends php, js, and css updates to browser for us
	concat			= require('gulp-concat'), // Concat our js
	uglify			= require('gulp-uglify'); // Minify our js


////////////////////////////////////////////////////////////////////////////////
// Path Configs
////////////////////////////////////////////////////////////////////////////////

var paths = {
	sassPath: 'assets/sass/',
	nodePath: 'node_modules/',
	jsPath: 'assets/js/',
	destPath: 'assets/dist/',
	foundationJSpath: 'node_modules/foundation-sites/js/',
	imgPath: 'assets/img/'
};


////////////////////////////////////////////////////////////////////////////////
// Sprite Task
////////////////////////////////////////////////////////////////////////////////

var svgConfig = {
  mode: {
    symbol: { // symbol mode to build the SVG
      dest: 'sprite', // destination foldeer
      sprite: 'sprite.svg', //sprite name
      example: true // Build sample page
    }
  },
  svg: {
    xmlDeclaration: false, // strip out the XML attribute
    doctypeDeclaration: false, // don't include the !DOCTYPE declaration
		rootAttributes: { // add some attributes to the <svg> tag
      width: 0,
      height: 0,
      style: 'position: absolute;',
     }
  }
};

gulp.task('sprite-page', function() {
  return gulp.src(paths.imgPath + 'svg/**/*.svg')
    .pipe(svgSprite(svgConfig))
    .pipe(gulp.dest(paths.destPath));
});


////////////////////////////////////////////////////////////////////////////////
// Our browser-sync task
////////////////////////////////////////////////////////////////////////////////

gulp.task('browser-sync', function() {
	var files = [
		'**/*.php'
	];

	browserSync.init(files, {
		proxy: 'heisenberg.dev/'
	});
});


////////////////////////////////////////////////////////////////////////////////
// Styles - Sass
////////////////////////////////////////////////////////////////////////////////

gulp.task('styles', function() {
	gulp.src(paths.sassPath + '**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'compressed'
		})
		.on('error', notify.onError(function(error) {
			return "Error: " + error.message;
		}))
		)
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(size({showFiles: true}))
		.pipe(gulp.dest(paths.destPath + 'css')) // Location of our app.css file
		.pipe(browserSync.stream({match: '**/*.css'}))
		.pipe(notify({
			message: "✔︎ Styles task complete",
			onLast: true
		}));
});


////////////////////////////////////////////////////////////////////////////////
// JS
////////////////////////////////////////////////////////////////////////////////

gulp.task('js', ['foundation-js'], function() {
	return gulp.src(paths.jsPath + '**/*.js')
		.pipe(concat('app.js'))
		.pipe(gulp.dest(paths.destPath + 'js'))
		.pipe(uglify().on('error', notify.onError(function(error) {
			return "Error: " + error.message;
			}))
		)
		.pipe(gulp.dest(paths.destPath + 'js'))
		.pipe(browserSync.reload({stream:true}))
		.pipe(notify({ message: "✔︎ Scripts task complete!"}));
});


////////////////////////////////////////////////////////////////////////////////
// Foundation JS task, which gives us flexibility to choose what plugins we want
////////////////////////////////////////////////////////////////////////////////

gulp.task('foundation-js', function() {
	return gulp.src([

		/* Choose what JS Plugin you'd like to use. Note that some plugins also
		require specific utility libraries that ship with Foundation—refer to a
		plugin's documentation to find out which plugins require what, and see
		the Foundation's JavaScript page for more information.
		http://foundation.zurb.com/sites/docs/javascript.html */

		// Core Foundation - needed when choosing plugins ala carte
		'node_modules/foundation-sites/js/foundation.core.js',

		// Choose the individual plugins you want in your project
		'node_modules/foundation-sites/js/foundation.abide.js',
		'node_modules/foundation-sites/js/foundation.accordion.js',
		'node_modules/foundation-sites/js/foundation.accordionMenu.js',
		'node_modules/foundation-sites/js/foundation.drilldown.js',
		'node_modules/foundation-sites/js/foundation.dropdown.js',
		'node_modules/foundation-sites/js/foundation.dropdownMenu.js',
		'node_modules/foundation-sites/js/foundation.equalizer.js',
		'node_modules/foundation-sites/js/foundation.interchange.js',
		'node_modules/foundation-sites/js/foundation.magellan.js',
		'node_modules/foundation-sites/js/foundation.offcanvas.js',
		'node_modules/foundation-sites/js/foundation.orbit.js',
		'node_modules/foundation-sites/js/foundation.responsiveMenu.js',
		'node_modules/foundation-sites/js/foundation.responsiveToggle.js',
		'node_modules/foundation-sites/js/foundation.reveal.js',
		'node_modules/foundation-sites/js/foundation.slider.js',
		'node_modules/foundation-sites/js/foundation.sticky.js',
		'node_modules/foundation-sites/js/foundation.tabs.js',
		'node_modules/foundation-sites/js/foundation.toggler.js',
		'node_modules/foundation-sites/js/foundation.util.box.js',
		'node_modules/foundation-sites/js/foundation.util.keyboard.js',
		'node_modules/foundation-sites/js/foundation.util.mediaQuery.js',
		'node_modules/foundation-sites/js/foundation.util.motion.js',
		'node_modules/foundation-sites/js/foundation.util.nest.js',
		'node_modules/foundation-sites/js/foundation.util.timerAndImageLoader.js',
		'node_modules/foundation-sites/js/foundation.util.touch.js',
		'node_modules/foundation-sites/js/foundation.util.triggers.js',

	])
	.pipe(concat('foundation.js'))
	.pipe(uglify())
	.pipe(gulp.dest(paths.destPath + 'js'));
});


////////////////////////////////////////////////////////////////////////////////
// Watch our files and fire off a task when something changes
////////////////////////////////////////////////////////////////////////////////

gulp.task('watch', function() {
	gulp.watch(paths.sassPath + '**/*.scss', ['styles']);
	gulp.watch(paths.jsPath + '**/*.js', ['js']);
	gulp.watch(paths.imgPath + 'svg/**/*.svg', ['sprite-page']);

});


// Our default gulp task, which runs all of our tasks upon typing in 'gulp' in Terminal
gulp.task('default', ['styles', 'js', 'browser-sync', 'sprite-page', 'watch']);
