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
  <link rel="stylesheet" href="/swal/sweetalert2.css"/>
  <script src="/swal/sweetalert2.js"></script>
  <script src="/js/window-handler.js"></script>
	<link rel="stylesheet" href="/style/form-basic.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</head>
<body onload="triggerEmailWindow();">
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1>Open<a href="/">Lab</a></h1>
      </div>
    </div>
    <div id="content">
      <div></div>
      <form class="form-basic" method="post" action="php/addinfo.php">
            <div class="form-title-row">
                <h1>OpenLab Signup</h1>
            </div>
            <div class="form-row">
                <label>
                    <span>E-Mail</span>
                    <input id="email_form" type="text" name="email" readonly>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Select Lab</span>
                    <select id="select" name="dropdown">
                        <option>Add New Lab</option>
                    </select>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Lab Title</span>
                    <input type="text" name="title">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Lab Room</span>
                    <input type="text" name="room">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Brief Description</span>
                    <input type="text" name="description">
                </label>
            </div>

            <div class="form-row">
                <button type="submit">Submit</button>
            </div>

        </form>
    </div>
    <div id="footer">
      <p>Copyright &copy; simplestyle_8 | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
  </div>
</body>
</html>
