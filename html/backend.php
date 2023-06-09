<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

include("mainfile.php");
include("includes/ipban.php");
global $prefix, $db, $nukeurl;
header("Content-Type: text/xml");
$cat = intval($cat);
if (isset($cat) && !empty($cat)) {
	$catid = $db->sql_fetchrow($db->sql_query("SELECT catid FROM ".$prefix."_stories_cat WHERE title LIKE '%$cat%' LIMIT 1"));
	if ($catid == "") {
		$result = $db->sql_query("SELECT sid, title, hometext FROM ".$prefix."_stories ORDER BY sid DESC LIMIT 10");
	} else {
		$catid = intval($catid);
		$result = $db->sql_query("SELECT sid, title, hometext FROM ".$prefix."_stories WHERE catid='$catid' ORDER BY sid DESC LIMIT 10");
	}
} else {
	$result = $db->sql_query("SELECT sid, title, hometext FROM ".$prefix."_stories ORDER BY sid DESC LIMIT 10");
}

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n\n";

echo '!DOCTYPE rss [';
echo '<!ENTITY % HTMLspec PUBLIC';
echo '"-//W3C//ENTITIES Latin 1 for XHTML//EN"';
echo '"http://www.w3.org/TR/xhtml1/DTD/xhtml-special.ent">';
echo '%HTMLspec;';
echo "<rss version=\"0.91\">\n\n";
echo "<channel>\n";
echo "<title>".htmlentities($sitename)."</title>\n";
echo "<link>$nukeurl</link>\n";
echo "<description>".htmlentities($backend_title)."</description>\n";
echo "<language>$backend_language</language>\n\n";

while ($row = $db->sql_fetchrow($result)) {
	$rsid = intval($row['sid']);
	$rtitle = filter($row['title'], "nohtml");
	$rtext = filter($row['hometext']);
	echo "<item>\n";
	echo "<title>".htmlentities($rtitle)."</title>\n";
	echo "<link>$nukeurl/modules.php?name=News&amp;file=article&amp;sid=$rsid</link>\n";
	echo "<description>".htmlentities($rtext)."</description>\n";
	echo "</item>\n\n";
}
echo "</channel>\n";
echo "</rss>";
