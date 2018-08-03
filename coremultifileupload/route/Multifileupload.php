<?php
class Multifileupload {
    
	function __construct() {
	    
	}
 
	function reArrayFiles(&$file_post) {

	    $file_ary = [];
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);
	    for ($i=0; $i<$file_count; $i++) {
		foreach ($file_keys as $key) {
		    $file_ary[$i][$key] = $file_post[$key][$i];
		}
	    }

	    return $file_ary;
	}
	
	function bulkfileupload(&$file_post){
	    $file_ary = $newary = [];
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);
	    $target_dir_vcd = 'uploads/';
	    if (!file_exists($target_dir_vcd)) {
                    if (!mkdir($target_dir_vcd, 0777, true)) {
                        chmod($target_dir_vcd, 0777);
                    }
                }
	    for ($i=0; $i<$file_count; $i++) {
		foreach ($file_keys as $key) {
		    $file_ary[$i][$key] = $file_post[$key][$i];
		}		
		$get = move_uploaded_file($file_ary[$i]['tmp_name'], "./uploads/".basename($file_ary[$i]["name"]));
		if($get){
		    $newary[$i]['name'] = $file_ary[$i]['name'];
		    $newary[$i]['type'] = $file_ary[$i]['type'];
		    $newary[$i]['size'] = $file_ary[$i]['size'];
		}else{
		    $newary[$i]['error'] = 1;
		}
	    }
	    return $newary;
	    
	}
 
}
