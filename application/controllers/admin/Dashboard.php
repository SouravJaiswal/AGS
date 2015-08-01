<?php defined('BASEPATH') or exit('No direct script access');


/**
* Dashboard Controller
* Author: Sourav Jaiswal
*/ 
class Dashboard extends Admin_controller
{
	
	function __construct()
	{
		parent::__construct();

	}
	public function index()
	{
		$this->render('admin/dashboard_view');
	}
}