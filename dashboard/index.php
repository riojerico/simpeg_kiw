<!DOCTYPE html>
<html>
<head>
	<title>AutoComplete With Jquery UI Plugin</title>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="page-title">
		<h1>Autocomplete <br/><small>With Jquery UI Plugin</small></h1>
		<small class="author">By <a href="http://www.syakirurohman.net">Syakir Rahman</a></small>
	</div>
    <form method="get" action="" class="ac-form">
        <div class="form-group">
            <input type="text" id="search" name="term" class="search-input" placeholder="Cari.."/><button class="search-submit" type="submit">Go</button>
        </div>
    </form>

</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#search").autocomplete({
                source: "<?php echo 'data.php';?>"
            });
        });	
</script>
</body>
</html>