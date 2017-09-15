<?php
	//session_start();
	if(isset($_FILES['upload'])){ 
	    $file_name = $_FILES['upload']['name'];
	    $file_tmp = $_FILES['upload']['tmp_name'];
	}
	move_uploaded_file($file_tmp, ("libs/instruction-card/".$file_name));
	/*echo "	<script>alert('Upload Instruction Card Success');
					document.location.href='../inventory_list?page=1';
			</script>";*/
?>