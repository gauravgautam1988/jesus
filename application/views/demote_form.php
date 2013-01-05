<?php $this->load->view('header')?>

<?php echo validation_errors() ?>


<form action="<?php echo site_url('hr/demoteprocess');?>" method='post' name='process'>
            <h2>Demote Employee</h2>
            <br />            
            <label for='employeeno'>Employee NO</label>
            <input type='text' name='employeeno' id='employeeno'  /><br />
         
            <label for='demote'>Demote Employee To</label>
            <input type='text' name='demote' id='demote'  /><br />                         
        
            <input type='Submit' value='Demote Employee' />            
        </form>
    </div>








<?php $this->load->view ('header')?>