<?php
namespace Grav\Plugin;
class PiCpuTempTwigExtension extends \Twig_Extension
{
	/**
	 * get class name
	 */
	public function getName()
	{
		return 'PiCpuTempTwigExtension';
	}

	/**
	 * public function name: 'piCpuTemp'
	 *
	 * runs funtion 'piCpuTempFunction'
	 */
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('piCpuTemp', [$this, 'piCpuTempFunction'])
		];
	}
	/**
	 * main function to extend Twig
	 */
	public function piCpuTempFunction()
	{
		$sensor_path = '/sys/class/thermal/thermal_zone0/temp';
		$readme_url = 'https://github.com/cron-ix/grav-plugin-pi-cpu-temp#readme';

		// read content
		$sensor_value = @file_get_contents($sensor_path);
		// error handling
		// file not found or NULL
		if ($sensor_value === FALSE) {
				$return_value = sprintf('Temperature sensor not found at "%1$s", see "README.md" (%2$s) for further information.', $sensor_path, $readme_url);
		}
		// return value is > 0
		// ToDo: can core temp be lower than 0 (extreme cooling scenarios)?
		elseif (intval("$sensor_value") > 0) {
				$return_value = number_format($sensor_value/1000, 1, ',', '.') . " °C";
		}
		// value is not numeric or 0 and lower
		else {
				$return_value = sprintf('No temperature found at "%1$s".', $sensor_path);
		}
		
		return $return_value;
	}
}

