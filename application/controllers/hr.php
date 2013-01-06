<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Hr extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
		$this->load->helper('form');
    }
    
    public function index(){
        // Loads hr homepage
       
		 $data ['title'] =  "hr";
		 
		 $this->load->view ('hrhome',$data);
    }
    
	
	public function addprocess(){
     // sets up validation rules
	 $this->load->library('form_validation');
	 
	    $this->form_validation->set_rules('firstname', 'First Name', 'required');
	    $this->form_validation->set_rules('lastname', 'Last Name', 'required'); 
	    $this->form_validation->set_rules('gender', 'Gender', 'required');  
		$this->form_validation->set_rules('DOB', 'D.O.B.', 'required');
		$this->form_validation->set_rules('department', 'Department', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
	    $this->form_validation->set_rules('salary', 'Salary', 'required');
	  
	  // if the validation is false goes back to from
	   if ($this->form_validation->run() == FALSE)
      {
         $this->add_employee();
      }
      else
      {
	   $firstname=$this->input->post('firstname');
	   $lastname= $this->input->post('lastname');
	   $gender= $this->input->post('gender');
	   $DOB= $this->input->post('DOB');
	   $department= $this->input->post('department');
	   $title= $this->input->post('title');
	   $salary= $this->input->post('salary');
	   
	   
		$this->load->model('databasemodels');
		$this->databasemodels->add_employee($firstname, $lastname, $gender, $DOB, $department, $title, $salary);
        $this->load->view('addedemployee');
      }
	    
    }
	// loads the add employee form
	public function add_employee(){
	
	 $data ['title'] =  "Add Employee";
	 $this->load->view('add_form',$data);
	    
    }
	
	// process the delete function
	public function deleteprocess(){
     
	 $this->load->library('form_validation');
	 
	  $this->form_validation->set_rules('employeeno', 'Employee No', 'required');
	  
	  	   if ($this->form_validation->run() == FALSE)
      {
         $this->delete_employee();
      }
      else
      {
	   $employeeno=$this->input->post('employeeno');
	   
	   
	 $this->load->model('databasemodels');
		$this->databasemodels->delete_employee($employeeno);
        $this->load->view('deleteemployee');
	 
	}
	 
	 }
	
	// loads delete employee form
	public function delete_employee(){
	
	 $data ['title'] =  "Delete Employee";
	 $this->load->view('delete_form',$data);
	    
    }
	
	// process for changing job title
	public function changejobtitleprocess(){
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('employeeno', 'Employee No', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->change_title();
		}
		else
		{
			$employeeno=$this->input->post('employeeno');
			$newtitle=$this->input->post('changetitle');
			var_dump($newtitle);
			
			$this->load->model('databasemodels');
			$oldtitle = $this->databasemodels->gettitlebyid($employeeno);
	
			$this->databasemodels->change_title($employeeno, $oldtitle[0]->title, $newtitle);
			$this->load->view('changetitle');
		}
	}
	
	// loads change title form
	public function change_title(){
	
	 $data ['title'] =  "Change Title";
	 $this->load->view('changetitle_form',$data);
	   
    }
	
	// loads advance search view form
	function advanced_search_view() {
		$data['title'] =  "advanced search";
		$this->load->view('advancedsearch_form', $data);
	}
	
	//does all the functionality for advanced search
	function advanced_search() {
		$this->load->model('databasemodels');
		
		$firstname = $this->input->get('firstname');
		$lastname = $this->input->get('lastname');
		$department = $this->input->get('department');
		$title = $this->input->get('title');
		
		$results = $this->databasemodels->advanced_search($firstname,$lastname,$department,$title);
		$data['title'] =  "advanced search";
		$data['adv_search_results'] = $results;
		
		$this->load->view('advancedsearch_form', $data);
	}
	
	// checks if validated
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
	// destroys session and logs out
	 public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
 }
 ?>