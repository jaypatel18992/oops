<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent:: __construct();
		$this->load->Model('Model');

	}

	public function auth()
	{   
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Username / Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');

			$this->load->view('login');
		}
		else
		{
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');


			$login =  $this->Model->select_where("admin",$data);
			

			if(count($login) == 1)
			{

				echo "ok";
				redirect('Admin/showdata');

			}
			else
			{

				//$this->session->set_flashdata('login_error','Invalid Email and Password');
				$data['msg'] =  "<p style='color: red;font-weight: bold;'>Wrong username or password! </p>";
				$this->load->view('login',$data);
			}
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('Login/auth');
	}
}