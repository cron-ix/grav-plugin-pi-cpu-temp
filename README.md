# GRAV Plugin: Raspberry Pi Core Temperature

If your GRAV CMS is running on a Raspberry Pi, this plugin let's you show the Pi cpu core temperature. This plugin uses PHP shell_exec to read the value from `/sys/class/thermal/thermal_zone0/temp`

## Installation

Installing the pi-cpu-temp plugin can be done in one of two ways. The GPM (Grav Package Manager) in
stallation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    `$ bin/gpm install pi-cpu-temp`

This will install the pi-cpu-temp plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/pi-cpu-temp`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `pi-cpu-temp`. You can find these files on [GitHub](https://github.com/cron-ix/grav-plugin-pi-cpu-temp) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    `$ /your/site/grav/user/plugins/pi-cpu-temp`
    
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.


## Usage

1. Set Process Twig to true for your page
2. in content use `{{ piCpuTemp() }}`
