<?php
// 视频 ID 与名称的映射关系数组
$ids = [
    'ws' => '573ib1kp5nk92irinpumbo9krlb', //北京卫视
    'wy' => '54db6gi5vfj8r8q1e6r89imd64s', //BRTV文艺
    'kj' => '53bn9rlalq08lmb8nf8iadoph0b', //BRTV科教
    'ys' => '50mqo8t4n4e8gtarqr3orj9l93v', //BRTV影视
    'cj' => '50e335k9dq488lb7jo44olp71f5', //BRTV财经
    'sh' => '50j015rjrei9vmp3h8upblr41jf', //BRTV生活
    'xw' => '53gpt1ephlp86eor6ahtkg5b2hf', //BRTV新闻
    'kk' => '55skfjq618b9kcq9tfjr5qllb7r', //卡酷少儿
];
// 获取传入的参数 id，如果没有传入则默认为 'ws'
$id = strtolower($_GET['id'] ?? 'ws');
// 根据传入的参数 id 获取视频 ID
$id = $ids[$id];
// 生成签名
$salt = 'TtJSg@2g*$K4PjUH';
$sign = substr(md5("{$id}151" . time() . $salt), 0, 8);
// 拼接 API 请求 URL
$bstrURL = "https://pc.api.btime.com/video/play?from=pc&id={$id}&type_id=151&timestamp=" . time() . "&sign={$sign}";
// 重定向到播放地址
header("Location: " . json_decode(file_get_contents($bstrURL))->data->video_stream[0]->stream_url);
