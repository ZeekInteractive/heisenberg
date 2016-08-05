<?php
/**
 * Kickoff theme setup and build
 */

namespace Heisenberg;

define( 'HEISENBERG_VERSION', '2.0.3' );
define( 'HEISENBERG_DIR', __DIR__ );
define( 'HEISENBERG_URL', get_template_directory_uri() );

require_once __DIR__ . '/vendor/autoload.php';

\AaronHolbrook\Autoload\autoload( __DIR__ . '/includes' );