<?php
// Set a variable on your shell:
//  export CIVICRM_TEST_DSN= mysql://db_username:db_password@localhost/civicrm_tests_dev
// or modify and uncomment the configuration string under with your own config
// This file is a template for applying local-only test configuration options.
// It should be copied to "civicrm.settings.local.php".

// For more details, see:
// http://wiki.civicrm.org/confluence/display/CRM/Setting+up+your+personal+testing+sandbox+HOWTO

// Set the data-source for the test database. Tables in this database will be periodically
// deleted, truncated, etc.
define( 'CIVICRM_DSN', "mysql://db_username:db_password@localhost/civicrm_tests_dev" );


// To disable auto-generation of files in api/v3/examples:
// define('DONT_DOCUMENT_TEST_CONFIG', TRUE);