# GRAV Plugin: Raspberry Pi Core Temperature

If your [GRAV CMS](https://getgrav.org/) is running on a LINUX-powered Raspberry Pi, this plugin let's you show the Pi's SoC core temperature (in degree celsius). This plugin uses file_get_contents() to read the value from `/sys/class/thermal/thermal_zone0/temp`, so a device/OS supporting the interface for thermal zone devices (sensors) via sysfs is needed. Tested on Raspberry Pi 4B running [Manjaro ARM](https://manjaro.org/download/#raspberry-pi-4)

**Hint:** This plugin might work on other Linux operating systems, if the kernel provides [sysfs](https://en.wikipedia.org/wiki/Sysfs). But then you need to know which sensor exports its data at `thermal_zone0`.

## Installation

Installing the Raspberry Pi Cpu Temperature plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install pi-cpu-temp

This will install the Raspberry Pi Cpu Temperature plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/pi-cpu-temp`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `pi-cpu-temp`. You can find these files on [GitHub](https://github.com/cron-ix/grav-plugin-pi-cpu-temp) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/pi-cpu-temp
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/cron-ix/grav-plugin-pi-cpu-temp/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/pi-cpu-temp/pi-cpu-temp.yaml` to `user/config/plugins/pi-cpu-temp.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Note that if you use the Admin Plugin, a file with your configuration named pi-cpu-temp.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

To use this plugin, you need to do three little steps: **1.** enable Twig processing; **2.** disable cache; **3.** insert code

1. Enable Twig proccessing for your page:  
   a. Frontmatter:  
    ```yaml
    process:
        twig: true
    ```  

    b. Admin Plugin:
      * goto 'Page' and select your page  
      * click on 'Advanced' tab  
      * in section 'Overrides' enable 'Process' and enable 'Twig' (make sure it is checked)  

2. As pages are cached by default you need to disable caching (per page) if you want to read the temperature on load:  
    a. Frontmatter:  
    ```yaml
    never_cache_twig: true
    ```  
    b. Admin Plugin:  
      * goto 'Page' and select your page  
      * click on 'Advanced' tab  
      * in section 'Overrides' enable 'Never Cache Twig ' and click on 'Yes'  
        
3. Now you can use the following code in your page where you want to have the output:
    ```
    {{ piCpuTemp() }}
    ```
    This code snippet will be replaced with the output.

## To Do

- [ ] add option for Fahrenheit