<?php

if ( ! class_exists( 'FP_CLI' ) ) {
	return;
}

$fpcli_dist_archive_autoloader = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $fpcli_dist_archive_autoloader ) ) {
	require_once $fpcli_dist_archive_autoloader;
}

FP_CLI::add_command(
	'dist-archive',
	'Dist_Archive_Command',
	[
		'before_invoke' => function () {
			if ( version_compare( PHP_VERSION, '7.1', '<' ) ) {
				FP_CLI::error( 'PHP 7.1 or later is required.' );
			}
		},
	]
);
