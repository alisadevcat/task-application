<?
namespace BeeJee\Web\Base;

class DataSettings
{
	 public $settings;

	function getSettings()
	{
		// Database variables
		// Host name
		$settings['dbhost'] = 'localhost';
		// Database name
		$settings['dbname'] = 'alisa_web';
		// Username
		$settings['dbusername'] = 'test_project';
		// Password
        $settings['dbpassword'] = 'root_web2020';
		
		return $settings;
	}
}
?>