<?php # end.php ?>
<div id="footer">
<?php
$mtime = date("D M j G:i:s T Y", filemtime("$DOCUMENT_ROOT/$PHP_SELF") );
echo "  <p class='footer' style=\"text-align: right; margin-right: 20px;\">Updated: $mtime</p>\n";
?>

  <hr />
  
  <?php
        $footer = $_SERVER['DOCUMENT_ROOT'] . "/common/footer-x.html";
        include($footer);
  ?>
  <?php
        $nav = $_SERVER['DOCUMENT_ROOT'] . "/common/footernav-x.html";
        include($nav);
  ?>
</div>

<!-- div#main -->
</div>

</body>
</html>

