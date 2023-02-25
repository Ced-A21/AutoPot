<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<title>Fetch FROM DATABASE and AJAX</title>
<head>

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet" />
    <style>
        .statstext {
            font-family: "Fjalla One";
        }
    </style>

<script type="text/javascript">
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
<script type="text/javascript" src="js/jquery-1.6.3.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>

<script>
    ajaxcall()
    $(document).ready(function(){
         setInterval(ajaxcall, 1000);
    });
    var str="";

    function ajaxcall(){
        $.ajax({
	        type:'POST',
         	url: 'getData_ajax.php',
            success: function(data) {
	        $('#dito').html(data);
            }
        });
    }
</script>

</head>

<body>

<div id="dito">will show data here</div>
</body>
</html>