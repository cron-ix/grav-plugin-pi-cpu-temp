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
		try {
			// try to read the cpu temp from the RasPi sepcific path
			$cpu = shell_exec("cat /sys/class/thermal/thermal_zone0/temp");
			// return the formatted temperature in Degree Celsius
			return number_format($cpu/1000, 1, ',', '.') . " °C";
		} catch (Exception $ex) {
			// return error message
			// return $ex->getMessage();
			return "An error occured while reading from `/sys/class/thermal/thermal_zone0/temp`, see [README.md](https://github.com/cron-ix/grav-plugin-pi-cpu-temp#readme) for further information.";
		}
	}
}

