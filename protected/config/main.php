<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Olive Sparrow',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'jaihanuman',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'meta'=>array('class'=>'MetaClass'),
		'aws'=>array('class'=>'AwsClass'),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format

//		'urlManager'=>array(
//			'urlFormat'=>'path',
//			'rules'=>array(
//                //'/olive/index.php' => '',
//                //'/olive/index.php/site/trainings' => '/olive/trainings/',
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//			),
//		),

        'urlManager'=>array(
        			'urlFormat'=>'path',
         			'showScriptName'=>false,
              			'caseSensitive'=>false,
        			'rules'=>array(
                        //'/olive/index.php' => '',
                        //'/olive/index.php/site/trainings' => '/olive/trainings/',
        				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
        				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        			),
        		),

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
//             'caseSensitive'=>false,
        ),

		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database

		'db'=>array(
			//'connectionString' => 'mysql:host=localhost;port=8889;dbname=charuv_olive',
            'connectionString' => 'mysql:host=localhost;dbname=charuv_olive',
			'emulatePrepare' => true,
			'username' => 'charuv', //charuv_olive
			'password' => 'jai1hanuman',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'charudeepi@gmail.com',
	),
);