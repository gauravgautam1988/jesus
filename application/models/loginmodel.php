<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // gets user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // this is where the password is encrypted
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        
        // runs the query
        $query = $this->db->get('users');
        //  check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then creates session data
            $row = $query->row();
            $data = array(
                    'id' => $row->userid,
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>