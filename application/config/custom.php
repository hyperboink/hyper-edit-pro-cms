<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Dev Environment
|--------------------------------------------------------------------------
|
| You can add dev environment keys here for development 
| or else other feature configs will be set to production
| for example the email configs.
|
*/

$config['dev'] = 'localhost|dev|test|staging';

/*
|--------------------------------------------------------------------------
| SMTP Providers
|--------------------------------------------------------------------------
|
| Set Smtp providers for your email.
|
*/

$config['smtp'] = 'mailtrap'; // Set SMTP Provider

// SMTP Provider configs
$config['smtp_providers'] = [
	'gmail' => [
		'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'hypereditpro@gmail.com',
        'smtp_pass' => 'hyperboink2013',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
	],
	'mailtrap' => [
		'protocol' => 'smtp',
		'smtp_host' => 'smtp.mailtrap.io',
		'smtp_port' => 2525,
		'smtp_user' => '1685e8c95e46b4',
		'smtp_pass' => 'd835cceff85090',
		'mailtype'  => 'html',
		'crlf' => "\r\n",
		'newline' => "\r\n"
	]
];

