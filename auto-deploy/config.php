<?php
/**
 * Directions:
 * 1) Replace the <hairpined values below with meaningful data
 * 2) Rename this file: config.php
 */


//** Main Configuration Section **\\

$TEST_HOSTNAME = 'makelab-test.cs.washington.edu';
$PROD_HOSTNAME = 'makelab-prod.cs.washington.edu';

$TEST_MODE = 'master'; //'branch name' OR keyword 'TAG
$PROD_MODE = 'TAG'; //'branch name' OR keyword 'TAG'

$AUTO_DEPLOY_REPO_URL = 'git@github.com:mechanicjay/makelab-auto-deploy.git'; //the ssh repo url of your auto-deploy aproject

//$DEPLOY_BRANCH = 'master'; //default setup is for the branch named here to be pushed to test on every push, with a 'tag push' to deploy to production.  

$USE_DOCKER = TRUE; // Set to FALSE for just doing code pulls without a docker container

/***
  * Only modify below here if you are using Docker
  */

$MAIL_CONTAINER_BUILD_RESULTS = TRUE; //Controls sending of docker build output to a configured email address;

$SEND_MAIL_TO = 'jhowe@cs.washington.edu';  //The configured email address(es), comma separated, referenced above

$CONTAINER_NAME = array('makeabilitylabwebsite'); //A unique name for your container, comma separated, quotes list for multiple containers


//** Auxiliary Configuration Section **\\

/**
 * If you have more than one container to deploy, 
 * please contact support for futher consultation as there are a several options
 * depending on needs and architecture.
 */

$SUBMODULE_PATH = 'makeabilitylabwebsite'; //If you've a git submodule for your containers, enter the relative path here, else ignore

$SUBMODULE_REPO_URL = 'git@github.com:mechanicjay/makeabilitylabwebsite.git'; //If you have a git submodule for your container, enter the repo url here, else ignore


//*** DO NOT MODIFY ANYTHING BELOW THIS LINE ***\\
DEFINE('DEPLOY_KEY', '/var/www/.ssh/id_rsa');
DEFINE('LOG_FILE', "/var/log/auto-deploy/$PROD_HOSTNAME.txt");

$BASE_DIR = "/var/www/vhosts/$PROD_HOSTNAME"; 

$ALLOWED_HTTP_METHODS = ['GET', 'POST'];

$DEPLOY_TRIGGERS = ['Push Hook', 'Tag Push Hook', 'push'];


// Which repos do we support, keyed on URL.  No trailing slash on 'deploy_to'.
$DEFINED_REPOS = array( 
    $AUTO_DEPLOY_REPO_URL => array(
        'deploy_to' => $BASE_DIR,
        'containers' => $CONTAINER_NAME
	),
    
    $SUBMODULE_REPO_URL => array(
    	'deploy_to' => $BASE_DIR.'/'.$SUBMODULE_PATH,
	'containers' => $CONTAINER_NAME
	)
	
     );

