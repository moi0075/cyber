<?php
require_once('../_helpers/strip.php');
?>
<html>
  <!-- From https://portswigger.net/web-security/dom-based/dom-clobbering -->
  <head>

  </head>
  <body>
    <!-- Modification -->
    <p>Hi, <?= htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8'); ?></p> 
    <script>
      window.onload = function(){
        let someObject = window.someObject || {};
        let script = document.createElement('script');
        script.src = someObject.url;
        document.body.appendChild(script);
     };
    </script>
  </body>
</html>
