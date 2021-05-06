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

		// read content
		$sensor_value = @file_get_contents($sensor_path);
		// do the error handling
		if ($sensor_value === FALSE) {
			$return_value = "An error occured while reading from `/sys/class/thermal/thermal_zone0/temp`, see [README.md](https://github.com/cron-ix/grav-plugin-pi-cpu-temp#readme) for further information.";
		}
		elseif (is_numeric($sensor_value)) {
			$return_value = number_format($cpu/1000, 1, ',', '.') . " °C";
		}
		return $return_value;
	}
}

