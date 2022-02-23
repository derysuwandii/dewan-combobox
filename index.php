<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Dewan Demo Conbobox bertingkat</title>
	<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark bg-primary fixed-top">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    Dewan Komputer
	  </a>
	</nav>

	<div class="container mb-5">
		<h2 align="center" style="margin: 60px 10px 10px 10px;">Dewan Demo Combobox PHP</h2><hr>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Combobox Statis</label>
					<select class="form-control" name="combo1" id="combo1">
						<option value="">Pilih Combobox Statis</option>
						<option value="Nama Provinsi 1">Nama Provinsi 1</option>
						<option value="Nama Provinsi 2">Nama Provinsi 2</option>
						<option value="Nama Provinsi 3">Nama Provinsi 3</option>
						<option value="Nama Provinsi 4">Nama Provinsi 4</option>
						<option value="Nama Provinsi 5">Nama Provinsi 5</option>
					</select>
				</div>

				<div class="form-group">
					<label>Combobox dengan PHP</label>
					<select class="form-control" name="combo2" id="combo2">
						<option value=""> Pilih Combo 1</option>
						<?php
							include 'koneksi.php';
							$query = "SELECT * FROM provinsi ORDER BY nama ASC";
							$dewan1 = $db1->prepare($query);
							$dewan1->execute();
							$res1 = $dewan1->get_result();
							while ($row = $res1->fetch_assoc()) {
									echo "<option value='" . $row['id_prov'] . "'>" . $row['nama'] . "</option>";
							}
						?>
					</select>
				</div>
				
				<div class="form-group">
					<label>Combobox dengan Javascript</label>
					<select class="form-control" name="combo3" id="combo3">
						<option value=""></option>
					</select>
				</div>

			</div>
		</div>
		<hr>
	</div>

	<div class="navbar bg-dark fixed-bottom">
		<div style="color: #fff;">© <?php echo date('Y'); ?> Copyright:
		    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
          	$.ajax({
                type: 'POST',
              	url: "get_provinsi.php",
              	cache: false, 
              	success: function(msg){
                  $("#combo3").html(msg);
                }
            });
         });
	</script>
</body>
</html>