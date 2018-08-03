<?php
require "route/Multifileupload.php";
$multi = new Multifileupload();
if($_POST){
    echo '<pre>';
    if($_POST['submit']!=""){
	//$_FILES = $multi->reArrayFiles($_FILES['files']);
	$_FILES = $multi->bulkfileupload($_FILES['files']);
	print_r($_FILES);
    }
    exit;
    
}else{
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" accept="image/*" multiple/>
    <input type="submit" name="submit" value="submit"/>
</form>
<?php 
    
}
?>