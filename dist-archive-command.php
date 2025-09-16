<?php

if ( ! class_exists( 'FIN_CLI' ) ) {
	return;
}

$fincli_dist_archive_autoloader = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $fincli_dist_archive_autoloader ) ) {
	require_once $fincli_dist_archive_autoloader;
}

FIN_CLI::add_command(
	'dist-archive',
	'Dist_Archive_Command',
	[
		'before_invoke' => function () {
			if ( version_compare( PHP_VERSION, '7.1', '<' ) ) {
				FIN_CLI::error( 'PHP 7.1 or later is required.' );
			}
		},
	]
);
