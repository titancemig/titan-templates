<HTML>
<BODY BGCOLOR=yellow>

<?php

phpinfo();

echo "**$REQUEST_METHOD** <BR>";
echo "**{$REQUEST_METHOD}** <BR>";
echo "**" .$REQUEST_METHOD." ** <BR>";
echo "**" . $REQUEST_METHOD . " ** <BR>";
echo "_Server: {$_SERVER["REQUEST_METHOD"]} ## <BR>";
echo "_ENV: {$_ENV["REQUEST_METHOD"]} ##<BR> ";


?>

</BODY>
</HTML>
