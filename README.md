[![No Maintenance Intended](http://unmaintained.tech/badge.svg)](http://unmaintained.tech/)

# DEPRECATED

This Craft CMS 2.x plugin is no longer supported, but it is fully functional, and you may continue to use it as you see fit. The license also allows you to fork it and make changes as needed for legacy support reasons.

The Craft CMS 3.x version of this plugin can be found here: [craft-pathtools](https://github.com/nystudio107/craft-pathtools) and can also be installed via the Craft Plugin Store in the Craft CP.

# PathTools twig plugin for Craft

This twig plugin for the Craft CMS brings convenient path & url manipulation functions & filters to your Twig templates.

Related: [PathTools for Craft 3.x](https://github.com/nystudio107/craft3-pathtools)

## Installation

To install PathTools, follow these steps:

1. Download & unzip the file and place the `pathtools` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/khalwat/pathtools.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `pathtools` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

## Usage

All of the functionality offered by PathTools can be used either as a filter, e.g.:

```
{{ myAsset.url | basename }}
```

Or as a function, e.g.:

```
{% set myBaseName = basename(myAsset.url) %}
```
## php Wrapper Functions
### pathinfo
Wrapper for the php pathinfo() function -- <http://php.net/manual/en/function.pathinfo.php>
### basename
Wrapper for the php basename() function -- <http://php.net/manual/en/function.basename.php>
### dirname
Wrapper for the php dirname() function -- <http://php.net/manual/en/function.dirname.php>
### parse_url
Wrapper for the php parse_url() function -- <http://php.net/manual/en/function.parse-url.php>
### parse_str
Wrapper for the php parse_str() function -- <http://php.net/manual/en/function.parse-str.php>
## Utility Functions
### swap_extension
Can be passed either a path or a url, and it will return the path or url with the filename extension changed, e.g.:

```
<source src="{{ myAsset.url | swap_extension('mp4') }}" type='video/mp4' />
<source src="{{ myAsset.url | swap_extension('webm') }}" type='video/webm' />

```
For ``myAsset.url`` = ``http://www.coolvids.com/content/vids/MyCoolVid.mp4`` the output would be:

```
<source src="http://www.coolvids.com/content/vids/MyCoolVid.mp4" type='video/mp4' />
<source src="http://www.coolvids.com/content/vids/MyCoolVid.webm" type='video/webm' />

```

### swap_directory
Can be passed either a path or a url, and it will return the path or url with the directory path changed, e.g.:

```
<img src="{{ myAsset.url | swap_directory('/over/there') }}" />

```
For ``myAsset.url`` = ``http://www.coolvids.com/not/here/rock.pdf`` the output would be:

```
<img src="http://www.coolvids.com/over/there/rock.pdf" />

```
### append_suffix
Can be passed either a path or a url, and it will return the path or url with the suffix appended to the filename, e.g.:

```
<img src="{{ myAsset.url | append_suffix('@2x') }}" />

```
For ``myAsset.url`` = ``http://www.coolvids.com/img/ux/search.png`` the output would be:

```
<img src="http://www.coolvids.com/img/ux/search@2x.png" />

```

## Changelog

### 1.0.2 -- 2016.08.04

* [Added] Added the parse_str() function
* [Improved] Updated the README.md

### 1.0.1 -- 2015.11.23

* [Added] Added support for Craft 2.5 new plugin features
* [Improved] Updated the README.md

### 1.0.0 -- 1/2/2015

* Initial release
