<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function xyz()
	{
		$this->load->view('event');
	}

	public function addevent()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('event_name','Event Name','required');
		$this->form_validation->set_rules('event_location','Event Location','required');
		$this->form_validation->set_rules('event_date','Event Date','required');
		$this->form_validation->set_rules('contact','contact','required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');

			$this->load->view('event');
		}
		else
		{
		$data['event_name'] = $this->input->post('event_name');
		$data['event_location'] = $this->input->post('event_location');
		$data['event_date'] = $this->input->post('event_date');
		$data['contact'] = $this->input->post('contact');

		$ins = $this->Model->insert("event",$data);
		if($ins)
		{
			echo $data['msg'] = "Inserted Successs..?";
			$this->load->view('event',$data);

		}
		else
		{
			echo "Error";
		}
	  }
	}

	public function showdata()
	{
		$data['result'] =  $this->Model->select_all("event");    	
		 //print_r($data['result']);
		$this->load->view('showdata',$data);
	}

	public function search_date()
	{
		$data['result'] =  $this->Model->select_all("event");    	
		 //print_r($data['result']);
		$this->load->view('search',$data);
	}

	public function getsearch()
	{
     $date1['event_date'] = $this->input->post('date_from');   // 02-06-2015
     $date2['event_date'] = $this->input->post('date_to');   // 19-06-2015
     $data['result']  = $this->Model->date_range("event",$date1,$date2);
     $this->load->view("search",$data);
    }

	public function delete($id)
	{
		$where = ["e_id"=>"$id"];
		$this->Model->delete("event",$where);
		redirect('Admin/showdata');
	}

	public function edit($id)
	{
		$where = ["e_id"=>"$id"];
		$data['edit_data'] = $this->Model->select_where("event",$where);
		$this->load->view('edit',$data);	
	}

	public function update($id)
	{
		$data['event_name'] = $this->input->post('name');
		$data['event_location'] = $this->input->post('location');
		$data['event_date'] = $this->input->post('date');
		$data['contact'] = $this->input->post('contact');

		$where = ["e_id"=>"$id"];
		$update = $this->Model->update("event",$data,$where);
		redirect('Admin/showdata');
		if($update)
		{
			echo "Update Successs..?";
		}
	}
}
