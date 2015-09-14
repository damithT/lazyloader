<HTML>
	<HEAD>
		<TITLE>Dynamic Scroll Test</TITLE>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function(){
				$('#loader-icon').hide();
				function getresult(url) {
					$.ajax({
						url: url,
						type: "GET",
						data:  {rowcount:$("#rowcount").val()},
						beforeSend: function(){
							$('#loader-icon').show();
						},
						complete: function(){
							$('#loader-icon').hide();
						},
						success: function(data){
							$("#rows").append(data);
						},
						error: function(){} 	        
					});
				}
				$('#rows').scroll(function(){
					var bottomCheck = parseInt($('#rows')[0].scrollHeight)-parseInt($('#rows').scrollTop());
					if(parseInt(bottomCheck) <= parseInt($('#rows').outerHeight())){
						if($(".pagenumber:last").val() <= $(".total-pages").val()) {
							var pagenum = parseInt($(".pagenumber:last").val()) + 1;
							getresult('getresult.php?page='+pagenum);
						}
					}
				});
			});
		</script>
	</HEAD>
	<BODY>
		<div class="col-lg-offset-2 col-lg-8" style="margin-top:20px">			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<div id="rowList" style="height:200px;">
						<div id="rows" style="height:200px;overflow-y:scroll;margin-left:30%;">
							<?php include('getresult.php'); ?>
						</div>
					</div>
					<div id="loader-icon"><img src="LoaderIcon.gif" /><div>
					</div>
				</div>
			</div>
		</BODY>
	</HTML>
