<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
$conn = new PDO("mysql:host=localhost;dbname=audioweb;charset=utf8", "root", "");
ini_set('memory_limit', '-1');

if(isset($_POST['upfilebtn'])){
  $fileName = $_FILES["upfile"]["tmp_name"];
  $fileType = strtolower($_FILES['upfile']['type']);

  if ($fileType == "audio/wav"){
	  //Read audio file
    $wavFile = new WavFile;
    $tmp = $wavFile->ReadFile($fileName);
    unlink($fileName);
	//Get binary code of signature
    function BintoText($bin){
      $text = "";
      for($i = 0; $i < strlen($bin)/8 ; $i++)
        $text .= chr(bindec(substr($bin, $i*8, 8)));
      return $text;
    }

    $subchunk3data = unpack("H*", $tmp['subchunk3']['data']);

    $signature = "";
    for($i = 0; $i < 80; $i++){
      $signature .= substr(str_pad(base_convert(substr($subchunk3data[1], $i*2, 2), 16, 2), 8, '0', STR_PAD_LEFT), 7, 1);
    }
    $lenofsigndat = BintoText(substr($signature, 0, 80));
    if (is_numeric($lenofsigndat)){
      for($i = 80; $i < 80+$lenofsigndat*8; $i++){
        $signature .= substr(str_pad(base_convert(substr($subchunk3data[1], $i*2, 2), 16, 2), 8, '0', STR_PAD_LEFT), 7, 1);
      }
      $signdat = BintoText(substr($signature, 80, $lenofsigndat*8));
    }
  }
} 

?>

<div>
  <form enctype="multipart/form-data" action="" method="POST">
    <div class="upload_form">
      <div class="title_form_row" ><h1>Check Signature</h1></div>
      <div class="form_row">
        <input type="hidden" name="MAX_FILE_SIZE"/>
        <label class="upload"><strong>Choose a file WAV to Check:</strong></label></div>
      <div class="form_row">
        <input type="file" class="upload_input" name="upfile" accept='audio/wav'/>
      </div>
      <div class="form_row">
        <input type="submit" value=" Check Now! " class="upload" name="upfilebtn" style="color:#000"/>
      </div>
      <br/>
      <div class="form_row" style="margin: 15px; ">
        <?php 
        if(isset($_POST['upfilebtn'])){
          echo "<div class=\" text-center alert alert-" . ($signdat!="" ? "success" : "danger") . "\">" . ($signdat!="" ? $signdat : "No signature in this file!!!") . "</div>";
        }
        ?>
      </div>
    </div>
  </form>
</div>
