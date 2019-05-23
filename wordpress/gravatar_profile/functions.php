<?php

function show_gravatar_profile($content) {
	$hash = md5(strtolower(trim("メールアドレスを入力")));
	$str = file_get_contents("https://www.gravatar.com/{$hash}.php");
	$profile = unserialize($str);
	if (strpos($content, "[gravatar]") !== false && is_array($profile) && isset($profile['entry'])) {
		$profile_html =
			  "<div>"
			.   "<div>"
			.     "<img src='https://www.gravatar.com/avatar/{$hash}' >"
			.   "</div>"
			.   "<div>"
			.     $profile["entry"][0]["displayName"]
			.   "</div>"
			.   "<div>"
			.     $profile["entry"][0]["aboutMe"]
			.   "</div>"
			. "</div>";

		$content = str_replace("[gravatar]", $profile_html, $content);
	}
	return $content;
}
add_filter('the_content', 'show_gravatar_profile');

?>
