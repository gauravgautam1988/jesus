<?php $this->load->view ('header')?>

 <form name="input" action="<?php echo site_url('hr/advanced_search') ?>" method="get">
	
	
	<fieldset>
	<legend> Advanced Search </legend>
 First Name: <input type="text" name="firstname" id="firstname"><br>
 Last Name: <input type="text" name="lastname" id="lastname"><br>
 Department: <input type="text" name="department" id="department"><br>
 Title: <input type="text" name="title" id="title"><br>

 <input type="submit" value="Search">
	<fieldset>
 </form>
	<table class="search_results">
		<thead>
		<tr>
			<th>First name  </th>
			<th>Last Name</th>
			<th>Department Name </th>
			<th>Department Number </th>
			<th>Title</th>
			<th>Is Manager</th>
			<th>DOB </th>
			<th>Salary</th>
			<th>Gender </th>
			<th>Hire Date</th>
		</tr>
		</thead>
		<tbody>
			<?php if (isset($adv_search_results)) : ?>
			<?php //var_dump($adv_search_results) ?>
			<?php foreach ($adv_search_results as $key => $val ) : ?>
				<tr>
					<td><?php echo $val->firstname ?></td>
					<td><?php echo $val->lastname ?></td>
					<td><?php echo $val->dept ?></td>
					<td><?php echo $val->deptid ?></td>
					<td><?php echo $val->jobtitle ?></td>
					<td><?php echo $val->ismanager == 1 ? 'yes' : 'no' ?>
					<td><?php echo $val->birth_date ?></td>
					<td><?php echo $val->salary ?></td>
					<td><?php echo $val->gender ?></td>
					<td><?php echo $val->hire_date ?></td>
				</tr>
			<?php endforeach ?>
			<?php endif; ?>
		</tbody>
	
	
	</table>
	
	
<?php $this->load->view ('footer')?>
