<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Statistics</title>
    <link rel="shortcut icon" href="images/iconTab.ico" type="image/x-icon">
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
	<script>
		<!-- function print-->
		function myFunction() {
		window.print();
		}
	</script>

	<?php
		$con = mysqli_connect('localhost','root','','vcmsdatabase1') or Die();
	?>
	<html>
		<head>
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
		</head>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
				function drawChart() {
				var data = google.visualization.arrayToDataTable([['User', 'Total User'],
				<?php 
					$query = "	SELECT  userType, count(userType) FROM users  group by userType asc";
					$exec = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($exec)){
						echo "['".$row['userType']."',".$row['count(userType)']."],";
					}
				?>
				]);
				var options = {
				title: 'Total Users and user types.'
				};
				var chart = new google.visualization.ColumnChart(document.getElementById("columnchart2"));
				chart.draw(data, options);
			}
		</script>  

  </head>
  <body><button><a href="index.php"<button class="w3-bar w3-light-grey w3-round w3-display-bottom middle w3-show-small w3-button">Back</a></button></button>
<button class="w3-bar w3-light-grey w3-round w3-display-bottom middle w3-show-small w3-button" onClick="myFunction()">Print</button></br></br><table width="200" border="1">
     <tr align="center">
      <center> 
       <td><h3>BAR CHART ON TOTAL USERS</h3>
   <div id="columnchart2" style="width: 700px; height: 500px;"></div></td>
    </tr>
     
    
     

   </table>
   
   
   
  
   
   

</body>
</html>
				
				
				
				
				
				
					
            
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

	<script>
	Morris.Bar({
		
		element : 'chart',
		data: [<?php echo $chart_data; ?>],
		xkey:'year',
		ykey : ['profit', 'purchase', 'sale'],
		labels  : ['profit', 'purchase', 'sale'],
		hideHover : 'auto', 
	});
	</script>
	
	
	
</body>
</html>
