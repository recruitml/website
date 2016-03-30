<?php

strpos($_SERVER['SERVER_NAME'], 'mdpdev') !== false ?
	define('ENVIRONMENT', 'DEV') :
		define('ENVIRONMENT', 'LIVE');

// DEV settings
if (ENVIRONMENT == 'DEV')
{
	if (strpos($_SERVER['SERVER_NAME'], 'pb') !== false)
	{
		$dotSegments = explode(".", $_SERVER['SERVER_NAME']);		
		define('MDP_BRANCH', $dotSegments[1]);			
		define('MDP_EMAIL_TO', MDP_BRANCH.'@mediadog.ca');		
		
		define('MDP_SITE_PATH', 'http://recruitml.'.MDP_BRANCH.'.pb.mdpdev.ca');
		//define('MDP_FILE_PATH', '/mnt/www-pb/'.MDP_BRANCH.'/recruitml');
	}
	else
	{
		define('MDP_EMAIL_TO', 'matt@mediadog.ca');				
		//define('MDP_EMAIL_TO', 'graham@mediadog.ca');		
		
		define('MDP_SITE_PATH', 'http://recruitml.mdpdev.ca');
		//define('MDP_FILE_PATH', '/projects/recruitml/www');
	}
	
	define('MDP_MAIL_SMTP', '10.0.0.15');
	
	define('CAPTCHA_SITE_KEY', '6LeU_g4TAAAAAFtncCUAwfcxlCDdWwuRya57pFQs');
	define('CAPTCHA_SECRET_KEY', '6LeU_g4TAAAAAAufHVwV0DZno4aaVjVhf4_q_nV_');	
}
// LIVE settings
else if (ENVIRONMENT == 'LIVE')
{
	define('MDP_MAIL_SMTP', 'localhost');
	define('MDP_EMAIL_TO', 'patrick@recruitml.com');
			
	define('MDP_SITE_PATH', 'http://recruitml.com');
	//define('MDP_FILE_PATH', '/srv/www/recruitml/www');
	
	define('CAPTCHA_SITE_KEY', '6LeWKxwTAAAAAMS_tGAgNJDeM1U-K_tzrqFXM1FP');
	define('CAPTCHA_SECRET_KEY', '6LeWKxwTAAAAAMQvTVGLunneksKQty4QOq1o22O9');		
}


define('MDP_EMAIL_FROM', 'noreply@recruitml.com');