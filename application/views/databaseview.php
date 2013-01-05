<?php $this->load->view ('header')?>

 <form name="input" action="<?php echo site_url('find/findemp') ?>" method="get">
	
	<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}
</style>
	<fieldset>
	<legend> Search </legend>
 First Name: <input type="text" name="firstname" id="firstname"><br>
 Last Name: <input type="text" name="lastname" id="lastname"><br>
 Department: <input type="text" name="department" id="department"><br>
 Title: <input type="text" name="title" id="title"><br>
 <input type="submit" id="search_submit" value="Search">
	<fieldset>
 </form>
	<table class="search_results">
	
		<thead>
		<tr>
			<th>First name  </th>
			<th>Last Name</th>
			<th>Department Name </th>
			<th>Title</th>
			</tr>
		</thead>
		<tbody>

		
		</tbody>
	
	
	</table>
	
	
<?php $this->load->view ('footer')?>

