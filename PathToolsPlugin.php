<?php
namespace Craft;

class PathToolsPlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('PathTools');
    }

    public function getDescription()
    {
        return 'This twig plugin for the Craft CMS brings convenient path & url manipulation functions & filters to your Twig templates.';
    }
    
    public function getDocumentationUrl()
    {
        return 'https://github.com/khalwat/pathtools/blob/master/README.md';
    }
    
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/khalwat/pathtools/master/releases.json';
    }
    
    public function getVersion()
    {
        return '1.0.2';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'nystudio107';
    }

    public function getDeveloperUrl()
    {
        return 'http://nystudio107.com';
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
