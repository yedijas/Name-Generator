<?php

require_once('yedijas.name.generator.namemodel.php');
// $hasil = GetName(2, 'a', 'a', 3);
// print_r($hasil);
?>
<form action="result.php" method="POST" id="baby_name">
	<div>
		<div>
			Gender:
		</div>
		<div>
			<input type="radio" name="gender" id="male"  value="1">
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="2">
			<label for="female">Female</label>
			<input type="radio" name="gender" id="both" value="3">
			<label for="both">Both</label>
		</div>
	</div>
	<div>
		<div>
			<label for="start">Name starts with:</label>
			<input type="text" name="start" id="start" placeholder="Fill single character">
		</div>
		<div>
			<label for="end">Name ends with:</label>
			<input type="text" name="end" id="end" placeholder="Fill single character">
		</div>
	</div>
	<div>
		<div>
			<label for="origin">Origin</label>
		</div>
		<div>
			<select id="origin" name="origin">
				<?php 
					$hasil = GetOrigins();
					foreach($hasil as $SOrigin){
						echo "<option value=\"". $SOrigin['id'] . "\">" . $SOrigin['desc'] . "</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div>
		<input type="submit" value="Generate Baby Name">
	</div>
</form>