<?php
class Find extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('databasemodels');
	}
	function index() {
	$data ['title'] =  "find";
	
	$this->load->view('databaseview', $data);
	}
	function findemp () {
	
	$firstname = $this->input->get('firstname');
	$lastname = $this->input->get('lastname');
	$department = $this->input->get('department');
	$title = $this->input->get('title');
	
	$results= $this->databasemodels->search($firstname,$lastname,$department,$title);
	
	$data['count'] = count($results['rows']);
	$data['results'] = $results['rows']; // inside array
	
	echo json_encode($data);
	
	//$this->load->view('databaseview', $data);
	}
	
	


}

