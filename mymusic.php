<?php 
include_once("classmusic.php");
$mm= new MyMusic;
$showListDaMua= $mm->showListDaMua($_SESSION['username']);
$n = mysqli_num_rows($showListDaMua);
?>

<div class="w3-container">
<?php if ($n > 0){?>
<div class="tableheader" style="width:750px; margin:auto;">
<table class="table table-hover ">
  <thead>
    <tr>
      <th >#</th>
      <th >Song</th>
      <th ></th>
    </tr>
  </thead>
</table>
<div class="scrollable">
  <table class="table table-hover">
    <tbody class="detailrow">
      <?php
            

            $i = 1;
            while($rowMusic = mysqli_fetch_array($showListDaMua)){
                ?>
      <tr>
        <td><?php echo"$i"?></td>
        <td><?php echo'<div>'.$rowMusic['song']." - ".$rowMusic['singer'].' </div>'
                    ?></td>
        <td><a href="<?php echo $rowMusic['link']?>" target="_blank" ></i>DownLoad</a></td>
      </tr>
      <?php $i++; } 

      		
      ?>
    </tbody>
  </table>
  <?php }
  	else
	{echo '<h1 style="text-align:center; ">Please buy any  <a href="index.php">SONG</a></h1>';}
  ?>
</div>
