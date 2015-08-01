<?php defined('BASEPATH') or exit('No direct access llowed to the scripts'); 


/**
* User Class
* For login in and logging out		
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->library('ion_auth');
	}

	function index()
	{
		$this->data['title'] = 'Login';
		if ($this->input->post()) {
			//ds
		}
		$this->load->helper('form');
		$this->render('admin/login_view','admin_master');
			
	}
  public function repos()
  {
    $this->data['page_title'] = "Repository";
    $user = $this->ion_auth->user()->row();
    $this->data['user'] = $user;
    $this->data['repos'] = array_slice(scandir('uploads/'.$user->username),2);
    $this->render('admin/user/repos_view','admin_master');

  }
  public function view(...$key)
  {
    $this->data['page_title'] = $key[0];
    $user = $this->ion_auth->user()->row();
    $this->data['user'] = $user;

    $this->data['repos'] = array_slice(scandir('uploads/'.$user->username.'/'.$key[0]),2);
    //$this->data['current_path'] = $current_path.$key.'/';
    $this->render('admin/user/single_view','admin_master');
  }
  public function uploadFiles()
  {
  	$this->data['page_title']= "Create New Repository";
    $user = $this->ion_auth->user()->row();
    $this->data['user'] = $user;
    $config['upload_path'] = './uploads/';
    //$config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '100';
    //$config['max_width']  = '1024';
    //$config['max_height']  = '768';
    $this->load->library('upload', $config);
    $this->render('admin/user/upload_file_view','admin_master');
  }
	public function createRepos()
	{
		$this->data['page_title']= "Create New Repository";
    $user = $this->ion_auth->user()->row();
    $this->data['user'] = $user;
		if($this->input->post())
		  {
		    $this->load->library('form_validation');
		    $this->form_validation->set_rules('identity', 'Identity', 'required');
		    if($this->form_validation->run()===TRUE)
		    {
		      $repos = $this->input->post('identity');
		      if (mkdir('uploads/'.$user->username.'/'.$repos, 0755) == 1)
		      {
            	echo "done";
		        redirect('admin/user/uploadFiles', 'refresh');
		      }
		      else
		      {
		        $this->session->set_flashdata('message','Error creating repository.Contact the web master');
		        redirect('admin', 'refresh');
		      }
		    }
		  }
		  $this->load->helper('form');
		  $this->render('admin/user/upload_view','admin_master');
		
	}

	public function login()
	{
	  $this->data['page_title'] = 'Login';
	  if($this->input->post())
	  {
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('identity', 'Identity', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('remember','Remember me','integer');
	    if($this->form_validation->run()===TRUE)
	    {
	      $remember = (bool) $this->input->post('remember');
	      if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
	      {
	        redirect('admin', 'refresh');
	      }
	      else
	      {
	        $this->session->set_flashdata('message',$this->ion_auth->errors());
	        redirect('admin/user/login', 'refresh');
	      }
	    }
	  }
	  $this->load->helper('form');
	  $this->render('admin/login_view','admin_master');
	}

	public function logout()
	{
	  $this->ion_auth->logout();
	  redirect('admin/user/login', 'refresh');
	}
	public function profile()
	{
	  $this->data['page_title'] = 'User Profile';
	  $user = $this->ion_auth->user()->row();
	  $this->data['user'] = $user;
	  $this->data['current_user_menu'] = '';
	  if($this->ion_auth->in_group('admin'))
	  {
	    $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
	  }
	  print '1';
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('first_name','First name','trim');
	  $this->form_validation->set_rules('last_name','Last name','trim');
	  $this->form_validation->set_rules('company','Company','trim');
	  $this->form_validation->set_rules('phone','Phone','trim');

	  if($this->form_validation->run()===FALSE)
	  {
	    $this->render('admin/user/profile_view','admin_master');
	  }
	  else
	  {
	    $new_data = array(
	      'first_name' => $this->input->post('first_name'),
	      'last_name' => $this->input->post('last_name'),
	      'company' => $this->input->post('company'),
	      'phone' => $this->input->post('phone')
	    );
	    if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
	    $this->ion_auth->update($user->id, $new_data);

	    $this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/user/profile','refresh');
	  }
}
}