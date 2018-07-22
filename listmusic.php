<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
ini_set('memory_limit', '-1'); //This will allow the script to use unlimited memory and to allow it to execute without any execution time limition
ini_set('max_execution_time', 180); //định PHP cho time-out là 30 giây. Nếu bạn cho phép người dùng upload 10M, thì bạn phải chỉnh file cấu hình cho thời gian time-out tăng lên.
?>

		<div class="clr"></div>
		<div class="tableheader" style="margin-top:25px; ">
			<table class="table table-hover ">
				<thead>
					<tr>
						<th class="col-xs-1">#</th>
						<th class="col-xs-5">Song</th>
						<th class="col-xs-4">Singer</th>
						<th class="col-xs-2" style="margin-right:10px;">Status</th>
					</tr>
				</thead>
             </table>
    	<div class="scrollable">
			<table class="table table-hover table-condensed table-fixed">
				<tbody class="detailrow">
					<?php
					$i = 1;
					while($rowMusic = mysqli_fetch_array($showMusic)){ // sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp, mảng liên tục hoặc cả hai.
						echo "<tr> <td>" . $i . "</td>
						<td>" . $rowMusic['song'] . "</td>
						<td>" . $rowMusic['singer'] . "</td>
						<td>";

						if (isset($_SESSION['username'])){
							if(($mm->checkListBuy($rowMusic['fieldspr'],$_SESSION['username']))==0){


								echo "<button id='".$rowMusic['id']."' class='muanhac'><img src='images/buy.png'/></button>";
							}
							else{
								echo "Owner";
							}
						}
						else{
							echo "Please Sign In";
						}
						echo "  </td>
						</tr>";
						$i++;
					}
					?>
				</tbody>
			</table>
            </div>
		</div>
		<div class="clr"></div>


<div class="clearfix"></div>


<script>
	(function ($) {
		$(".muanhac").click(function(){
			$("*").css("cursor", "wait");
			var buysongid = $(this).attr("id");
			$.ajax({ //https://www.w3schools.com/jquery/ajax_ajax.asp
				url: "check.php",
				type: "GET",
				data: { buysongid : buysongid },
				success : function(response){
					$("*").css("cursor", "default");
					if (response == "buy success"){
						alert("Bạn đã mua thành công!");
						window.location="";
					}
					else {
						alert(response);
						window.location="";
					}
				}
			});
		});
	})(jQuery);

</script>