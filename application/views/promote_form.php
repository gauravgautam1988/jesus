<?php $this->load->view('header')?>

<?php echo validation_errors() ?>


<form action="<?php echo site_url('hr/promoteprocess');?>" method='post' name='process'>
            <h2>Promote Employee</h2>
            <br />            
            <label for='employeeno'>Employee NO</label>
            <input type='text' name='employeeno' id='employeeno'  /><br />
			
			<label for='promote'>Promote Employee To</label>
            <input type='text' name='promote' id='promote'  /><br />
         
                                      
        
            <input type='Submit' value='Promote Employee' />            
        </form>
    </div>








<?php $this->load->view ('header')?>