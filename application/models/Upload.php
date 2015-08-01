<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* Upload model
*/
class Upload extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
		
	}
}