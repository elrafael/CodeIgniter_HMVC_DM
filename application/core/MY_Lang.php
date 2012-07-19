<?php

class MY_Lang extends MX_Lang {

	function line($line = '')
	{
		$value = ($line == '' OR ! isset($this->language[$line])) ? FALSE : $this->language[$line];

		// Because killer robots like unicorns!
		if ($value === FALSE)
		{
			if ( count($this->is_loaded) == 0 )
				log_message('error', 'Could not find the language line "'.$line.'"');
		}
		return $value;
	}
}
/* End of file MY_Lang.php */
/* Location: ./application/core/MY_Lang.php */