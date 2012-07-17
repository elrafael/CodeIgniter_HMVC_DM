<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Path to PHPTAL library, i used 1.2.0
include 'PHPTAL.php';


/**
* Wrapper for PHPTAL tempalte engine
*/

class Tal extends PHPTAL{


    function __construct()
    {

        //Call PHPTAL constructor (because we can)

        parent::__construct();


        /**
        * Use CI config to set encoding, templates and compiled templates path
        */

        $CI =& get_instance(); //BUGGGGGG!!!! CI FORUM BUG, REMOVE the ; SYNTAX ERROR!


        /**
        * You can change paths if you need to
        */

        $cache_path = $CI->config->item('cache_path');

        if(empty($cache_path))
        {
            $cache_path = APPPATH.'cache/';
        }


        $this->setEncoding($CI->config->item('charset'));
        $this->setTemplateRepository(APPPATH.'views/');
        $this->setPhpCodeDestination($cache_path);


    }


    /**
    * @param string  (template name or path)
    * @param boolean (set TRUE to return page content)
    * @result mixed (depends on second parameter)
    *
    * This method returns or echoes parsed tempalte content
    */

    function display($tpl, $return=false)
    {
        $ci =& get_instance();
        $module = $ci->uri->segment(1);
        $is_module = $ci->router->fetch_module();

        //First check in the modules folder
        if ( is_file(APPPATH . 'modules/' .$module . '/views/' . $tpl . '.php') )
            $this->setTemplate(APPPATH . 'modules/' .$module . '/views/' . $tpl . '.php');    
        //then the regular folder
        elseif ( is_file(APPPATH . 'views/' . $tpl . '.php' ) )
            $this->setTemplate(APPPATH . 'views/' . $tpl . '.php');
        //Nothing to show? We have an error!
        else
        {
            //If i'm NOT using modulars system
            if ( empty($is_module) )
                show_error(APPPATH . '/views/' . $tpl . '.php' . ' not found');
            //Using modules
            else
                show_error(APPPATH . 'modules/' . $module . '/views/' . $tpl . '.php' . ' not found');
        }
        //$this->setTemplate($tpl);

        if($return)
            return $this->execute();

        $this->echoExecute();
    }
}