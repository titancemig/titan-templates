<?php
# begin.php

# web root directory
$wroot = "http://www.ral.ucar.edu/projects/titan";

# Find the current section from the URI, based on directory name.
$sections = array(
  "home" =>
    array("name" => "TITAN home", "uri" => "/home/"),

  "docs" =>
    array("name" => "Documentation", "uri" => "/docs/"),

  "download" =>
    array("name" => "Download", "uri" => "/download/"),

  "sites" =>
    array("name" => "TITAN sites", "uri" => "/sites/"),

  "ralhome" =>
    array("name" => "RAL home", "uri" => "../../../"),

);

# The last match in this regexp is the directory name of interest.
# While the section names (and associated directory names) are unique,
# some sections reside in the 'user' subdirectory.  Workable, but crufty...
preg_match('|/titan?/(\w+)/|', $_SERVER['REQUEST_URI'], $matches);
$current_section = $sections[array_pop($matches)]['name'];

# topics: function to build the vnav "Topics" menu and currently,
# the sidebar.
function topics($topics) {
  echo "<div id='sidebar'>\n";
  echo "\n";

  echo "<div id='vnavcontainer'>\n";
  echo "<h2>Topics</h2>\n";
  echo "<ul id='vnavlist'>\n";

  # Generate the topics menu list of links.
  if (empty($topics) ) {
    echo "  <li class=\"comment\"><em>No topics listed</em></li>\n";
  }
  else {
    while (list($key, $val) = each($topics) ) {
      echo "  <li><a href=\"$val\">$key</a></li>\n";
    }
  }

  echo "</ul>\n";
  echo "</div>\n";

#  echo "\n";
#  include("search.php");
#  echo "\n";

#  include("w3.php");

  echo "\n";
  echo "<!-- div#sidebar -->\n";
  echo "</div>\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/x html1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo "TITAN :: $current_section"; if ($title) echo " :: $title"; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link type="text/css" href="<?php echo $wroot; ?>/css/titan.css" media="screen" rel="stylesheet" title="Default" />
  <link type="text/css" href="<?php echo $wroot; ?>/css/print.css" media="print" rel="stylesheet" title="Default" />
</head>

<body>

<div id="header">
  <h2>Sections</h2>
  <ul id="primary">
<?php
# Set the current section for tab highlighting.
while (list($key, $val) = each($sections) ) {
  echo "  <li><a ";
  if ($val['name'] == $current_section) echo 'class="current" ';
  echo 'href="' . $wroot . $val['uri'] . '">' . $val['name'] . "</a></li>\n";
}
?>
  </ul>
</div>

<div id="main">
