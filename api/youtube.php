<?php
// 获取 URL 中的 id 和 q 参数，如果不存在则设置默认值
$id = $_GET["id"] ?? "9sE12tg3CmA";
$quality = $_GET["q"] ?? "hd";
// 定义一个函数，用于获取指定 URL 的 HTML 内容
function get_data($url){
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)");
curl_setopt($ch, CURLOPT_REFERER, "http://facebook.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
// 获取 YouTube 视频的 HTML 内容
$string = get_data('https://www.youtube.com/watch?v=' . $id);
// 从 HTML 内容中提取 M3U8 文件的链接
preg_match_all('/hlsManifestUrl(.*m3u8)/', $string, $matches, PREG_PATTERN_ORDER);
$rawURL = str_replace("\/", "/", substr($matches[1][0], 3));
// 根据视频质量参数值设置不同的正则表达式，以匹配相应的 M3U8 播放链接
$quality_regex = match ($quality) {
'720' => '/(https:\/.*\/95\/.*index.m3u8)/',
'480' => '/(https:\/.*\/94\/.*index.m3u8)/',
'hd' => '/(https:\/.*\/96\/.*index.m3u8)/',
};
// 获取视频播放链接
preg_match_all($quality_regex, get_data($rawURL), $playURL, PREG_PATTERN_ORDER);
// 将播放链接发送给客户端
header("Location: " . $playURL[1][0]);
?>
