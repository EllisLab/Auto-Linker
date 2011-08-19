<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
						'pi_name'			=> 'URL and Email Auto-linker',
						'pi_version'		=> '1.1',
						'pi_author'			=> 'Rick Ellis',
						'pi_author_url'		=> 'http://www.expressionengine.com/',
						'pi_description'	=> 'Automatically links URLs within text',
						'pi_usage'			=> Auto_linker::usage()
					);

/**
 * Auto_linker Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2004 - 2009, EllisLab, Inc.
 * @link			http://expressionengine.com/downloads/details/auto_linker/
 */

class Auto_linker {

    var $return_data;

	/**
	 * Constructor
	 *
	 * @access	public
	 * @return	void
	 */

    function Auto_linker($str = '')
    {
		$this->EE =& get_instance();
		
		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
                
    	$pop = ($this->EE->TMPL->fetch_param('target') == 'blank') ? " target=\"_blank\" " : "";
    
        // Clear period from the end of URLs
        $str = preg_replace("#(^|\s|\()((http://|https://|www\.)\w+[^\s\)]+)\.([\s\)])#i", "\\1\\2{{PERIOD}}\\4", $str);
        
        // Auto link URL
        $str = preg_replace("#(^|\s|\(|>)((http(s?)://)|(www\.))(\w+[^\s\)\<]+)#i", "\\1<a href=\"http\\4://\\5\\6\"$pop>http\\4://\\5\\6</a>", $str);

        //$str = preg_replace("#(^|\s|\(|..\])((http(s?)://)|(www\.))(\w+[^\s\)\<\[]+)#im", "\\1<a href=\"http\\4://\\5\\6\"$pop>http\\4://\\5\\6</a>", $str);


        
        // Clean up periods
        $str = preg_replace("#<a href=(.+?){{PERIOD}}(.+?){{PERIOD}}</a>#", "<a href=\\1\\2</a>.", $str);
        
        // Clear period from the end of emails
        $str = preg_replace("#(^|\s|\(|>)([a-zA-Z0-9_\.\-]+)@([a-zA-Z0-9\-]+)\.([a-zA-Z0-9\-\.]*)\.([\s\)])#i","\\1\\2@\\3.\\4\\5{{PERIOD}}",$str);
        
        // Auto link email
        $str = preg_replace("/(^|\s|\(|>)([a-zA-Z0-9_\.\-]+)@([a-zA-Z0-9\-]+)\.([a-zA-Z0-9\-\.]*)/i", "\\1<a href=\"mailto:\\2@\\3.\\4\">\\2@\\3.\\4</a>", $str);

		// Cleand up stray periods
 		$str = str_replace(" {{PERIOD}}", ". ", $str);
 
 		$this->return_data = $str;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Usage
	 *
	 * Plugin Usage
	 *
	 * @access	public
	 * @return	string
	 */
	function usage()
	{
		ob_start(); 
		?>
		Auto-links URLs

		Wrap whatever you want formatted within:

		{exp:auto_linker}

		text you want processed

		{/exp:auto_linker}


		There is one optional parameter which will option links in a new window.

		target="blank"

		Version 1.1
		******************
		- Updated plugin to be 2.0 compatible

		<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}

	// --------------------------------------------------------------------

}
// END CLASS

/* End of file pi.auto_linker.php */
/* Location: ./system/expressionengine/third_party/auto_linker/pi.auto_linker.php */