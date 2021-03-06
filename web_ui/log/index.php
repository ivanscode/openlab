
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require ($root . "\login\loginheader.php");
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>OpenLab</title>
  <meta name="description" content="Monitor and manage the whereabouts of your students" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="/style/style.css" />
  <script src="/js/jquery-3.1.1.min.js"></script>
  <script src="/js/auto-functions.js"></script>
  <link rel="stylesheet" href="/swal/sweetalert2.css"/>
  <script type="text/javascript" src="/js/clock.js"></script>
  <script src="/swal/sweetalert2.js"></script>
  <script src="/js/window-handler.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1>Open<a href="/today">Lab</a></h1>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
        <span>
          <a href="/login/logout.php"><img title="Logout" src="/img/logout.png" style="width:45px;height:45px;cursor:pointer;"></img></a>
        </span>
        <div id="info">
        <table>
          <tr style="background: #D3D3D3; color: #000;">
            <th>Name</th>
            <th>Room</th>
            <th>Description</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Lab Violations</th>
          </tr>
        <?php
        $islog = true;
        $root = $_SERVER['DOCUMENT_ROOT'];
        include($root . "\php\update-table.php");
         ?>
       </div>
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; simplestyle_8 | <a href="http://www.html5webtemplates.co.uk" target="_blank">design from HTML5webtemplates.co.uk</a></p>
    </div>
  </div>
</body>
</html>
