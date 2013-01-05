<?php $this->load->view('header')?>

<?php echo validation_errors() ?>


<form action="<?php echo site_url('hr/changejobtitleprocess');?>" method='post' name='process'>
            <h2>Change Job Title</h2>
            <br />            
            <label for='employeeno'>Employee NO</label>
            <input type='text' name='employeeno' id='employeeno'  /><br />
         
           
			<label for='changetitle'>Change Title To</label>
			<select name="changetitle" id="changetitle">
   <option value="Staff">Staff</option>
   <option value="Senior Staff">Senior Staff</option>
   <option value="Engineer">Engineer</option>
   <option value="Assistent Engineer">Assistent Engineer</option>
   <option value="Senior Engineer">Senior Engineer</option>
   <option value="Technique Leader">Technique Leader</option>
			</select> </br>	
           

		
        
            <input type='Submit' value='Change Title' />            
        </form>








<?php $this->load->view ('footer')?>