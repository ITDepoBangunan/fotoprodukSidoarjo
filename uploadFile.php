<?php

class emp{}

$foto = $_POST['foto'];
$nama = $_POST['nama'];

$curYear=date('Y');
$curMonth=date('m');
$curDate=date('d');


//$file_pathYear ="";
$file_pathYear = $curYear . "/";

//$file_pathMonth ="";
$file_pathMonth = $curYear . "/".$curMonth."/";

//$file_pathDate ="";
$file_pathDate = $curYear . "/".$curMonth."/".$curDate."/";


if (!file_exists($file_pathDate)) {
	if (!file_exists($file_pathMonth)) {	
		if (!file_exists($file_pathYear)) {
			mkdir($file_pathYear);
			$finalDir = $file_pathDate;
		}else{
			$finalDir = $file_pathDate;
		}
		mkdir($file_pathMonth);	
	}else{
		$finalDir = $file_pathDate;
	}
	mkdir($file_pathDate);	
}else{
	$finalDir = $file_pathDate;
}


if ($foto!="") {
	/*$fotoName = "$nama_$curDate$curMonth$curDate.png";		*/
	$fotoName = $nama."_".$curDate.$curMonth.$curYear.".jpg";		
	$pathKTP = "$finalDir".$fotoName;

}
if ($foto!="") {
	file_put_contents($pathKTP,base64_decode($foto));
	$response = new emp();
	$response->success = 1;
	$response->message = "Sukses upload foto. Mohon untuk info Customer Service";
	die(json_encode($response));
}else{
	$response = new emp();
	$response->success = 0;
	$response->message = "Gagal Upload";
	die(json_encode($response));
}

?>