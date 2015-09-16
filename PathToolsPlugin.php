<?php
namespace Craft;

class PathToolsPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('PathTools');
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Megalomaniac';
    }

    public function getDeveloperUrl()
    {
        return 'http://megalomaniac.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.pathtools.twigextensions.PathToolsTwigExtension');

        return new PathToolsTwigExtension();
    }
}
