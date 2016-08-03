<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class PathToolsTwigExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'PathTools';
    }

/* -- Return our twig filters */

    public function getFilters()
    {
        return array(
            'pathinfo' => new \Twig_Filter_Method($this, 'pathinfo_filter'),
            'basename' => new \Twig_Filter_Method($this, 'basename_filter'),
            'dirname' => new \Twig_Filter_Method($this, 'dirname_filter'),
            'parse_url' => new \Twig_Filter_Method($this, 'parse_url_filter'),
            'parse_string' => new \Twig_Filter_Method($this, 'parse_string_filter'),

            'swap_extension' => new \Twig_Filter_Method($this, 'swap_extension_filter'),
            'swap_directory' => new \Twig_Filter_Method($this, 'swap_directory_filter'),
            'append_suffix' => new \Twig_Filter_Method($this, 'append_suffix_filter'),
        );
    }

/* -- Return our twig functions */

    public function getFunctions()
    {
        return array(
            'pathinfo' => new \Twig_Function_Method($this, 'pathinfo_filter'),
            'basename' => new \Twig_Function_Method($this, 'basename_filter'),
            'dirname' => new \Twig_Function_Method($this, 'dirname_filter'),
            'parse_url' => new \Twig_Function_Method($this, 'parse_url_filter'),
            'parse_string' => new \Twig_Function_Method($this, 'parse_string_filter'),

            'swap_extension' => new \Twig_Function_Method($this, 'swap_extension_filter'),
            'swap_directory' => new \Twig_Function_Method($this, 'swap_directory_filter'),
            'append_suffix' => new \Twig_Function_Method($this, 'append_suffix_filter'),
        );
    }

/* -- php pathinfo() wrapper -- http://php.net/manual/en/function.pathinfo.php */

    public function pathinfo_filter($path, $options = false)
    {
    	if ($options)
       		$output = pathinfo($path, $options);
       	else
       		$output = pathinfo($path);
        return $output;
    } /* -- pathinfo_filter */

/* -- php basename() wrapper -- http://php.net/manual/en/function.basename.php */

    public function basename_filter($path, $suffix = false)
    {
    	if ($suffix)
        	$output = basename($path, $suffix);
        else
        	$output = basename($path);
        return $output;
    } /* -- basename_filter */

/* -- php dirname() wrapper -- http://php.net/manual/en/function.dirname.php */

    public function dirname_filter($path)
    {
        $output = dirname($path);
        return $output;
    } /* -- dirname_filter */

/* -- php parse_url() wrapper -- http://php.net/manual/en/function.parse-url.php */

    public function parse_url_filter($url, $component = -1)
    {
        $output = parse_url($url, $component);
        return $output;
    } /* -- parse_url_filter */

/* -- php parse_str() wrapper -- http://php.net/manual/en/function.parse-str.php */

    public function parse_string_filter($string)
    {
        parse_str($string, $output);
        return $output;
    } /* -- parse_string_filter */

/* -- Swap the file extension on a passed url or path */

    public function swap_extension_filter($path_or_url, $extension)
    {

       	$path = $this->_decompose_url($path_or_url);
       	$path_parts = pathinfo($path['path']);
	   	$new_path = $path_parts['dirname'] . "/" . $path_parts['filename'] . "." . $extension;

        $output = $path['prefix'] . $new_path . $path['suffix'];
        return $output;
    } /* -- swap_extension_filter */

/* -- Swap the file directory on a passed url or path */

    public function swap_directory_filter($path_or_url, $directory)
    {

       	$path = $this->_decompose_url($path_or_url);
       	$path_parts = pathinfo($path['path']);
	   	$new_path = $directory . "/" . $path_parts['basename'];

        $output = $path['prefix'] . $new_path . $path['suffix'];
        return $output;
    } /* -- swap_directory_filter */

/* -- Appened a suffix a passed url or path */

    public function append_suffix_filter($path_or_url, $suffix)
    {
       	$path = $this->_decompose_url($path_or_url);
       	$path_parts = pathinfo($path['path']);
	   	$new_path = $path_parts['dirname'] . "/" . $path_parts['filename'] . $suffix . "." . $path_parts['extension'];

        $output = $path['prefix'] . $new_path . $path['suffix'];
        return $output;
    } /* -- append_suffix_filter */


/* -- Decompose a url into a prefix, path, and suffix */

	private function _decompose_url($path_or_url)
	{
		$result = array();

    	if (filter_var($path_or_url, FILTER_VALIDATE_URL))
    	{
	    	$url_parts = parse_url($path_or_url);
	    	$result['prefix'] = $url_parts['scheme'] . "://" . $url_parts['host'];
	    	$result['path'] = $url_parts['path'];
	    	$result['suffix'] = "";
	    	$result['suffix'] .= (empty($url_parts['query'])) ? "" : "?" . $url_parts['query'];
	    	$result['suffix'] .= (empty($url_parts['fragment'])) ? "" : "#" . $url_parts['fragment'];
    	}
    	else
    	{
	    	$result['prefix'] = "";
	    	$result['path'] = $path_or_url;
	    	$result['suffix'] = "";
    	}

		return $result;
	} /* -- decompose_url */

}
