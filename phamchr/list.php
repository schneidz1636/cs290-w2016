
<!DOCTYPE html>
<html lang='en'>
	<!--This is the starter code for bootstrap-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://recarbonated.me/images/bootstrap-table.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="http://recarbonated.me/images/bootstrap-table.min.js"></script>
	</head>
	<!--This is the header/navbar that is present-->
	<body>
		<nav class="navbar navbar-inverse navbar-fixed">
			 <div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						
						</button>
					
					<a class="navbar-brand" href="#">OSU Book Tracker!</a>
			  </div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Books Available</a></li>
				<li><a href="#">Add Book</a></li>
				<li><a href="#">Add Location</a></li>
			<li><a href="#">My Inventory</a></li>
			</ul>
		<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</nav>
		</div>

<div class="container">
	<h1>Searching Events</h1>
	<div id="toolbar"></div>
	<table id="table"
		   data-toggle="table"
		   data-toolbar="#toolbar"
		   data-search="true"
		   data-show-refresh="true"
		   data-show-toggle="true"
		   data-show-columns="true"
		   data-show-export="true"
		   data-detail-view="true"
		   data-detail-formatter="detailFormatter"
		   data-minimum-count-columns="2"
		   data-pagination="true"
		   data-id-field="id"
		   data-page-list="[10, 25, 50, 100, ALL]"
		   data-show-footer="false"
		   data-response-handler="responseHandler">
			<thead>
				<tr>
				  <th data-field= "tID">Transaction ID</th>
				  <th data-field= "bookName">Book Name</th>
				  <th data-field= "lentTo">Lent To</th>
				  <th data-field= "date">Date Lent</th>
				  <th data-field= "return">Return Date</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td>1,001</td>
				  <td>Lorem</td>
				  <td>ipsum</td>
				  <td>dolor</td>
				  <td>sit</td>
				</tr>
				                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
			  </tbody>
	</table>
</div>

		<!--This is the main body-->
		  </div>
		</div>
	  </div>
	</div>
	</body>
</html>