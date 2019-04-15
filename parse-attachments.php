<?php
/**
*
* @Name : AutoNewsSubmitter/parse-attachments.php
* @Version : 1.0
* @Programmer : Max
* @Date : 2019-04-15
* @Released under : https://github.com/BaseMax/AutoNewsSubmitter/blob/master/LICENSE
* @Repository : https://github.com/BaseMax/AutoNewsSubmitter
*
**/
$input=file_get_contents("attachments.sql");
preg_match_all("/\((?<id>[0-9]+)\, 1, ".
	"\'([^\']+)\',".
	" \'([^\']+)\',".
	" \'\',".
	" \'(?<name>[^\']+)\'/", $input, $output);
print '
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
';
$_id=1542;
foreach($output["id"] as $index=>$id) {
	$title=$output["name"][$index];

	print "(".$_id.", 1, '2019-04-15 04:37:24', '2019-04-15 04:37:24', '', '".$title."', '', 'publish', 'open', 'open', '', '".$title."', '', '', '2019-04-15 04:41:37', '2019-04-15 04:41:37', '', 0, 'http://www.test.com/?p=".$_id."', 0, 'post', '', 0),
	";
	$_id++;
}
// Remove the ',' from the last line of the output...
