<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template library
 *
 * Parse data to a template file.
 * 
 * @package Libraries
 * @subpackage Template
 * @since 2009-09-12
 * @author Jérôme Jaglale <jerome.jaglale@gmail.com>
 * @link http://maestric.com/doc/php/codeigniter_template
*/
class Template {
	var $template_data = array();

	function set( $name, $value )
	{
		$this->template_data[$name] = $value;
	}

	function load( $template = '', $view = '', $view_data = array(), $return = FALSE )
	{
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		return $this->CI->load->view($template, $this->template_data, $return);
	}
}
/* End of file Template.php */
/* Location: ./application/libraries/Template.php */