<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Copyright (C) 2004 - 2012 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Software without prior written authorization from EllisLab, Inc.
*/

$plugin_info = array(
						'pi_name'			=> 'Auto Linker',
						'pi_version'		=> '2.0',
						'pi_author'			=> 'EllisLab',
						'pi_author_url'		=> 'http://www.ellislab.com/',
						'pi_description'	=> 'Automatically creates links from URLs and/or email addresses contained within the given text.',
						'pi_usage'			=> Auto_linker::usage()
					);

/**
 * Auto_linker Class
 *
 * @package			ExpressionEngine
 * @category		Plugin
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2004 - 2011, EllisLab, Inc.
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

		$this->EE->load->helper('url');
		
		$str = ($str == '') ? $this->EE->TMPL->tagdata : $str;
        
        // Parameter to determine whether to convert only
        // URLs, email addresses, or both.
    	$convert = ($this->EE->TMPL->fetch_param('convert') == 'url' OR $this->EE->TMPL->fetch_param('convert') == 'email') ? $this->EE->TMPL->fetch_param('convert') : 'both';

    	// Parameter to determine whether link opens in a new window.
    	$pop = ($this->EE->TMPL->fetch_param('target') == 'blank') ? TRUE : FALSE;

        $str = auto_link($str, $convert, $pop);
 
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
		=====================================================
		Example
		=====================================================

		Wrap the text to be formatted within the plugin tags, like so:

		{exp:auto_linker}

		text you want processed

		{/exp:auto_linker}

		or...

		{exp:auto_linker}

		{custom_field}

		{/exp:auto_linker}


		Note: Mailto links created for email addresses use an obfuscated version of the mailto tag containing ordinal numbers written with JavaScript to help prevent the email address from being harvested by spam bots.

		=====================================================
		Optional Parameters
		=====================================================

		target="blank"
		- Links will open in a new window.

		convert=""
		- Set to "url" to only convert URLs.
		- Set to "email" to only convert email addresses.


		Version 2.0
		******************
		- Simplified plugin to use the auto_link() function from CodeIgniter's URL helper.
		- New optional parameter to choose to auto-link only URLs or email addresses.

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