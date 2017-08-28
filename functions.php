<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

define( 'HEISENBERG_VERSION', wp_get_theme()->version );
define( 'HEISENBERG_DIR', __DIR__ );
define( 'HEISENBERG_URL', get_template_directory_uri() );

require_once __DIR__ . '/src/custom-login.php';
require_once __DIR__ . '/src/customizer.php';
require_once __DIR__ . '/src/enqueue.php';
require_once __DIR__ . '/src/extras.php';
require_once __DIR__ . '/src/setup.php';
require_once __DIR__ . '/src/sidebars.php';
