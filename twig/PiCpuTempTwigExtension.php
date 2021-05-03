<?php
namespace Grav\Plugin;
class PiCpuTempTwigExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'PiCpuTempTwigExtension';
	}
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('piCpuTemp', [$this, 'piCpuTempFunction'])
		];
	}
	public function piCpuTempFunction()
	{
		try {
			$cpu = shell_exec("cat /sys/class/thermal/thermal_zone0/temp");
			return number_format($cpu/1000, 1, ',', '.') . " °C";
		} catch (Exception $ex) {
			return $e->getMessage();
		}
	}
}

