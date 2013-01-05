<?php
class Databasemodels extends CI_Model {
	function __construct() {
		$this->load->database();
		parent::__construct();
	}
 function search ($firstname,$lastname,$department,$title){
 
 // result query
	$q = $this->db->select('employees.first_name AS firstname, employees.last_name AS lastname, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01');
			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
		//count
		$resultq['rows'] = $q->get()->result();
		//$resultq['num_rows'] = $q->count_all_results();
		return $resultq;
	
 }
 
  function advanced_search ($firstname = null,$lastname = null,$department = null,$title = null){
 
 // result query
	$q = $this->db->select('employees.first_name AS firstname, employees.last_name AS lastname, employees.birth_date, employees.gender, employees.hire_date, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid, salaries.salary')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('salaries', 'salaries.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01');
			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
		//count
		//$resultq['num_rows'] = $q->count_all_results();
		return $q->get()->result();
	
 }


 
 public function add_employeedepartment($employeeid, $department){
 $fields = array (
		'emp_no' => $employeeid,
		'dept_no' => $department,
		'from_date' => date("Y-m-d"),
		'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('dept_emp');
 }
 
  public function add_employeetitle($employeeid, $title){
  $fields = array (
	'emp_no' => $employeeid,
	'title' => $title,
	'from_date' => date("Y-m-d"),
	'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('titles');
 
 }
  public function add_employeesalary($employeeid, $salary){
  $fields = array (
	'emp_no' => $employeeid,
	'salary' => $salary,
	'from_date' => date("Y-m-d"),
	'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('salaries');
 
 }
 
public function add_employee($firstname, $lastname, $gender, $DOB, $department, $title, $salary){
	
	$fields = array (
		'first_name' => $firstname,
		'last_name' => $lastname,
		'gender' => $gender,
		'birth_date' => $DOB,
		'hire_date' => date("Y-m-d"),
				
					);
	
	
	
	$this->db->set($fields); 
	
	$this->db->insert('employees');

	$employeeid = $this->db->insert_id();
	
	$this->add_employeedepartment($employeeid, $department);
	$this->add_employeesalary($employeeid, $salary);
	$this->add_employeetitle($employeeid, $title);





}

public function delete_employee($employeeno){
$tables = array ('employees', 'dept_manager','dept_emp','titles','salaries');
		
		
		$this->db->where('emp_no', $employeeno); 
	
	$this->db->delete($tables);

}
 
 
 public function change_title($employeeno,$oldtitle,$newtitle){
	$updatetitle = array ('to_date' => date("Y-m-d"));
	$query = $this->db->where('emp_no', $employeeno)
		->where('title', $oldtitle)
		->update('titles', $updatetitle);
 
 
		$row = array(
			'emp_no' => $employeeno,
			'title' => $newtitle,
			'from_date' => date("Y-m-d"),
			'to_date' => '9999-01-01'
		);
 
		$this->db->set($row)
			->insert('titles');
		
		
}
 
 public function gettitlebyid($employeeno){
	
 $query = $this->db->select('title')
	->from('titles')
	->where('emp_no',$employeeno)
	->where ('to_date', '9999-01-01')
	->get();
 
return $query->result();
}

 
}
