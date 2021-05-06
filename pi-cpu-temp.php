<?php
namespace Grav\Plugin;
use \Grav\Common\Plugin;
class PiCpuTempPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            // event hook when the core Twig extensions have been loaded
            'onTwigExtensions' => ['onTwigExtensions', 0]
        ];
    }

    /**
    * Composer autoload.
    *is
    * @return ClassLoader
    */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin to create the Twig extension
     */
    public function onTwigExtensions()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            // add Twig extension
            $this->grav['twig']->twig->addExtension(new PiCpuTempTwigExtension());
        ]);
    }
}
