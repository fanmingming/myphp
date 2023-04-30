<?php
// 从 URL 中获取 ID，如果没有提供 ID 则默认使用 ws，即北京卫视
$id = $_GET['id'] ?? 'ws';
// 存储不同频道的 ID
$n = [
    'ws' => '573ib1kp5nk92irinpumbo9krlb',  //北京卫视
    'wy' => '54db6gi5vfj8r8q1e6r89imd64s',  //BRTV文艺
    'js' => '53bn9rlalq08lmb8nf8iadoph0b',  //BRTV纪实科教
    'ys' => '50mqo8t4n4e8gtarqr3orj9l93v',  //BRTV影视
    'cj' => '50e335k9dq488lb7jo44olp71f5',  //BRTV财经
    'ty' => '54hv0f3pq079d4oiil2k12dkvsc',  //BRTV体育休闲
    'sh' => '50j015rjrei9vmp3h8upblr41jf',  //BRTV生活
    'xw' => '53gpt1ephlp86eor6ahtkg5b2hf',  //BRTV新闻
    'kk' => '55skfjq618b9kcq9tfjr5qllb7r',  //卡酷少儿
];
// 生成时间戳
$t = time();
// 使用 $n 数组中对应的 ID 和时间戳 $t 以及一个字符串 'TtJSg@2g*$K4PjUH' 生成一个签名 $s
$s = substr(md5($n[$id] . "151" . $t . 'TtJSg@2g*$K4PjUH'), 0, 8);
// 向 https://pc.api.btime.com 发送一个请求，获取视频的详细信息
$res = file_get_contents("https://pc.api.btime.com/video/play?from=pc&callback=&id=" . $n[$id] . "&type_id=151×tamp=" . $t . "&sign=" . $s);
// 从返回的 JSON 数据中获取视频的播放地址 $stream_url
$stream_url = json_decode($res)->data->video_stream[0]->stream_url;
// 进行一些解码操作，获取播放地址 $playurl
$playurl = base64_decode(base64_decode(strrev($stream_url)));
// 重定向用户到播放地址
header('location:' . $playurl);
?>
