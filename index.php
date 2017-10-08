<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
<?php require("./common/common_head.html"); ?>
</head>

<body>

<div class="main">
<?php 
    require("./common/header.html");

    /*require("./common/navigation.html");*/

    if (!isset($_GET['page'])) {
        require("./content/home.html"); 
    }
	else {
        $page = "./content/" . $_GET['page'];
    
        if (!file_exists($page)) {
		    require("./error/404.shtml");
	    }
	    else {
            require($page);
        } 
    }

    require("./common/footer.html");
?>
</div>

</body>
</html>
