Heisenberg - Zeek Starter Theme
===

This is the Zeek Starter theme, based on Underscores and Foundation 5.5.1.

<h2>Dependencies</h2>
<h3>Gulp</h3>
The theme dependencies are listed in our <code>package.json</code> file.  If you run <code>npm install</code>, all of the plugin dependencies will be install onto <code>node_modules</code>

<h3>Bower</h3>
We use bower as our front end package manager.  To get started, run <code>bower install</code> and all of the packages will be brought into the .assets/components directory.

<h3>Sass architecture</h3>
<pre><code>
sass/ 
| 
|– base/ 
|   |– _buttons.scss     # Buttons
|   |– _typography.scss  # Typography rules 
|   ...                  # Etc… 
| 
|– components/  
|   |– _navigation.scss  # Navigation 
|   ...                  # Etc… 
| 
| 
|– sections/ 
|   |– _header.scss      # Header 
|   |– _footer.scss      # Footer 
|   |– _sidebar.scss     # Sidebar 
|   |– _forms.scss       # Forms 
|   ...                  # Etc… 
| 
|– pages/ 
|   |– _front-page.scss  # Home specific styles 
|   ...                  # Etc… 
| 
| 
`– _settings.scss 		 # Foundation settings file
`– app.scss              # primary Sass file 
</code></pre>
<h3>Wordpress files</h3>
Our starter theme follows the Codex Template Heirchacy as found on http://codex.wordpress.org/Template_Hierarchy.

Site Front Page 		-	<code>front-page.php</code><br>
Blog Posts Index Page 	-	<code>home.php</code>