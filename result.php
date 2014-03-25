<?php

require_once('yedijas.name.generator.namemodel.php');
$hasil = GetName($_POST['gender'], $_POST['start'], $_POST['end'], $_POST['origin']);
$i = 1;
?>
<style>
.row{
	clear: both;
	margin: 5px 0;
}
	.row div{
		float: left;
	}
	.rownum{
		width: 30px;
	}
	.name{
		width: 150px;
	}
	.meaning{
		width: 250px;
	}
	.gender{
		width: 100px;
	}
	.origin{
		width: 100px;
	}
.row.head{
	font-weight: bold;
}
	.row.head div{

	}
</style>
<div>
	<div class="row head">
		<div class="rownum">&nbsp;</div>
		<div class="name">Name</div>
		<div class="meaning">Meaning</div>
		<div class="gender">Gender</div>
		<div class="origin">Origin</div>
	</div>
	<?php foreach($hasil as $singleName): ?>
		<div class="row">
			<div class="rownum"><?php echo $i; $i++; ?></div>
			<div class="name"><?php echo $singleName['name'] ?></div>
			<div class="meaning"><?php echo $singleName['meaning'] ?></div>
			<div class="gender"><?php echo $singleName['gender'] == 1?"Boy":$singleName['gender'] == 2?"Girl":"Both" ?></div>
			<div class="origin"><?php echo $singleName['desc'] ?></div>
		</div>
	<?php endforeach; ?>
</div>