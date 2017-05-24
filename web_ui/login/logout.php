

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project</title>
      <link rel="icon" href="/favicon.png">
      <link href="/default.css" rel="stylesheet" type="text/css" media="all" />
      <link href="/fonts.css" rel="stylesheet" type="text/css" media="all" />
      <script src="/alert/sweetalert.min.js"></script>
      <link href="/alert/sweetalert.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<script type="text/javascript">
function success(title, text, callback) {
    swal({
      title: title,
      text: text,
      type: 'success',
      showCancelButton: false,
      confirmButtonColor: "#DD6B55"
    }, callback);
  }
</script>
<?php
	session_start();
	session_destroy();
	echo '<script type="text/javascript">'
   , 'success("Bye", "You are logged out", function (ok) {',
        'if (ok) {',
            'window.location="/create_event.php";',
        '}',
        'else {',
        '}',
      '});'
   , '</script>';
?>

</body>
</html>
