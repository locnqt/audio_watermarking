
<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
$conn = new PDO("mysql:host=localhost;dbname=audioweb;charset=utf8", "root", "");
ini_set('memory_limit', '-1');

if (isset($_SESSION['username']) && $_SESSION['permission']=="1"){

  if(isset($_POST['upfilebtn']) && isset($_POST['singer']) && isset($_POST['song'])){
    $fileName = $_FILES["upfile"]["tmp_name"];
    $fileType = strtolower($_FILES['upfile']['type']);

    if ($fileType == "audio/wav"){
		// Upload audio file to Google Drive
      require_once 'google-api-php-client-2.2.1/vendor/autoload.php';
      $client = new Google_Client();
      putenv('GOOGLE_APPLICATION_CREDENTIALS=google-api-php-client-2.2.1/service_account_keys.json');
      $client = new Google_Client();
      $client->addScope(Google_Service_Drive::DRIVE);
      $client->useApplicationDefaultCredentials();
      $service = new Google_Service_Drive($client);

      $content = file_get_contents($fileName);
      $fileMetadata = new Google_Service_Drive_DriveFile(array('name' => mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_POST['singer'] . " - " . $_POST['song'] . ".wav")));
      $file = $service->files->create($fileMetadata, array(
        'data' => $content,
        'mimeType' => 'audio/wav',
        'uploadType' => 'multipart',
        'fields' => 'id')); 
      $fileId = $file->id;
      unlink($fileName);
	  //Share file to anyone
      $service->getClient()->setUseBatch(true);
      $batch = $service->createBatch();
      $filePermission = new Google_Service_Drive_Permission(array(
        'type' => 'anyone',
        'role' => 'reader',
      ));
      $request = $service->permissions->create($fileId, $filePermission, array('fields' => 'id'));
      $batch->add($request, 'anyone');
      $results = $batch->execute();
      $service->getClient()->setUseBatch(false);
      $fileUrl = "https://drive.google.com/file/d/" . $fileId . "/view?usp=sharing";
	  
	  // Record license to Database
      $qr = $conn->prepare("insert into music (song, singer, owner, link, fieldsid,fieldspr) values (:song, :singer, 'admin',:url,:id, :parentid);");
      $qr->bindParam(":id", $fileId, PDO::PARAM_STR);
      $qr->bindParam(":parentid", $fileId, PDO::PARAM_STR);
      $qr->bindParam(":song", $_POST['song'], PDO::PARAM_STR);
      $qr->bindParam(":singer", $_POST['singer'], PDO::PARAM_STR);
      $qr->bindParam(":url", $fileUrl, PDO::PARAM_STR);
      $qr->execute();
      echo '<script>alert("UpLoad Successed!")</script>';

    }
  }

}
?>
<div>
<form enctype="multipart/form-data" method="POST">
      <div class="upload_form">
        <div class="title_form_row" style="margin-left:15px;"><h1>UpLoad Song</h1></div>
        <div class="form_row">
          <label class="upload"><strong>Song name: </strong></label>
          
          <input type='text' name='song' class="upload_input" placeholder="song"/>
          
        </div>
        <div class="form_row">
          <label class="upload"><strong>Singer name: </strong></label>
          
          <input type='text' name='singer' class="upload_input" placeholder="singer"/>
          
        </div>
        <div class="form_row">
          <input type="hidden" name="MAX_FILE_SIZE"/>
          <label class="upload"><strong>Choose a file WAV to upload:</strong></label></div>
        <div class="form_row">
          <input name="upfile" type="file" accept="audio/wav"class="upload_input" name="upfile"/>
        </div>
        <div class="form_row">
          <input type="submit" value=" Upload File " class="upload" name="upfilebtn" style="color:#000"/>
        </div>
      </div>
    </form>
    </div>