<?php #news.php ?>
<!-- News. -->
<div id="news">

<?php
# To do:
# Add limit on number of articles printed, based on number of articles
# (not less than... 10?) and date (last 15 days?).
# Add support for comments in entry?  Octothorpes?
# Add test for HTML in entry, wrap paragraphs in <p>s.

# Set the location of the news directory.
$dir = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['SNAT_ROOT'] . "/news";

# autop: function to insert XHTML paragraph tags.
# See: http://photomatt.net/scripts.php/autop
function autop($p, $br = 1) {
  # Sanitize newlines.
  $p = preg_replace("/(\r\n|\n|\r)/", "\n", $p);

  # Strip empty lines.
  $p = preg_replace("/\n\n+/", "\n\n", $p);

  # Insert paragraph tags, including one at the end.
  $p = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>\n\n", $p);

  # Optionally, make line breaks.
  if ($br) $p = preg_replace('|(?<!</p>)\s*\n|', "<br />\n", $p);

  return $p;
}

# Reverse sort filenames in the directory of interest (news items).
# News item filename format: YYYY-MM-DD
$handle = opendir("$dir");
while (($file = readdir($handle)) ) {
  # Check for news item filename pattern.
  if (preg_match("/\d\d\d\d-\d\d-\d\d(\.\d+)?$/", $file) ) {
    $items[] = $file;
  }
}
closedir($handle);

# Reverse sort the item names, i.e., put them in reverse chronological order.
rsort($items);

# Print each news item.
# The first line of each file is the subject in plain text.
foreach ($items as $file) {
  $handle = fopen("$dir/$file", "r");

  # Build the "subject" line.
  $date = preg_replace("/\.\d+$/", "", $file);
  $subject = chop(fgets($handle, 4096) );

  echo "<div class=\"item\">\n";
  echo "<h3>$date: <span class=\"subject\">$subject</span></h3>\n";

  # Empty the text "container."
  $text = "";

  # Read the contents of the file.
  while (!feof($handle) ) {
    $line = fgets($handle, 4096);
    $text .= $line;
  }
  fclose($handle);

  # Add paragraph tags but only if no HTML tags are present in the text.
  if (!preg_match("/<|>/", $text) ) $text = autop($text, 0);

  echo $text;

  echo "\n</div>\n\n";
}

?>

<!-- div#news. -->
</div>
