<?php
$input=file_get_contents("attachments.sql");
preg_match_all("/\((?<id>[0-9]+)\, 1, ".
	"\'([^\']+)\',".
	" \'([^\']+)\',".
	" \'\',".
	" \'(?<name>[^\']+)\'/", $input, $output);
print '
INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
';
$_id=3901;
$_post_id=1542;
foreach($output["id"] as $index=>$id) {
	// $title=$output["name"][$index];

	print "(".$_id.", ".$_post_id.", '_thumbnail_id', '".$id."'),
	";
	$_id++;
	$_post_id++;
}
// Remove the ',' from the last line of the output...
