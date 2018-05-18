<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 180);
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
					while($rowMusic = mysqli_fetch_array($showMusic)){ 


						echo "<tr> <td class=\"dbody col-xs-1\">" . $i . "</td>
						<td class=\"dbody col-xs-5\">" . $rowMusic['song'] . "</td>
						<td class=\"dbody col-xs-4\">" . $rowMusic['singer'] . "</td>
						<td class=\"dbody col-xs-2\">";

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
		</div><!-- /.container -->
		<div class="clr"></div>


<div class="clearfix"></div>


<script>
	(function ($) {
		"use strict";
		$('.column100').on('mouseover',function(){
			var table1 = $(this).parent().parent().parent();
			var table2 = $(this).parent().parent();
			var verTable = $(table1).data('vertable')+"";
			var column = $(this).data('column') + ""; 

			$(table2).find("."+column).addClass('hov-column-'+ verTable);
			$(table1).find(".row100.head ."+column).addClass('hov-column-head-'+ verTable);
		});

		$('.column100').on('mouseout',function(){
			var table1 = $(this).parent().parent().parent();
			var table2 = $(this).parent().parent();
			var verTable = $(table1).data('vertable')+"";
			var column = $(this).data('column') + ""; 

			$(table2).find("."+column).removeClass('hov-column-'+ verTable);
			$(table1).find(".row100.head ."+column).removeClass('hov-column-head-'+ verTable);
		});
		$(".muanhac").click(function(){
			$("*").css("cursor", "wait");
			var buysongid = $(this).attr("id");
			$.ajax({
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