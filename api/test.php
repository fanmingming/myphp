<?php
    // 视频 ID 与名称的映射关系数组
    $ids = [
        'ws' => '573ib1kp5nk92irinpumbo9krlb', //北京卫视
        'wy' => '54db6gi5vfj8r8q1e6r89imd64s', //BRTV文艺
        'kj' => '53bn9rlalq08lmb8nf8iadoph0b', //BRTV科教
        'ys' => '50mqo8t4n4e8gtarqr3orj9l93v', //BRTV影视
        'cj' => '50e335k9dq488lb7jo44olp71f5', //BRTV财*
        'sh' => '50j015rjrei9vmp3h8upblr41jf', //BRTV生活
        'xw' => '53gpt1ephlp86eor6ahtkg5b2hf', //BRTV新闻
        'kk' => '55skfjq618b9kcq9tfjr5qllb7r', //卡酷少儿
    ];

    // 获取传入的参数 id，如果没有传入则默认为 'ws'
    $id = strtolower($_GET['id'] ?? 'ws');

    // 根据传入的参数 id 获取视频 ID
    $id = $ids[$id];

    // 获取当前时间戳
    $t = time();

    // 设置视频类型 ID
    $type_id = "151";

    // 生成签名
    $salt = 'TtJSg@2g*$K4PjUH';
    $sign = substr(md5("{$id}{$type_id}{$t}{$salt}"), 0, 8);

    // 拼接 API 请求 URL
    $url = "https://pc.api.btime.com/video/play?from=pc&id={$id}&type_id={$type_id}&timestamp={$t}&sign={$sign}";

    // 使用 curl 库向拼接好的 URL 发送请求
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['User-Agent: Mozilla/5.0'],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ]);
    $data = curl_exec($ch);
    curl_close($ch);

    // 将返回的数据解析为 JSON 格式
    $json = json_decode($data);

    // 从 JSON 数据中提取出视频的播放地址
    $playURL = strrev(base64_decode(base64_decode($json->data->video_stream[0]->stream_url)));

    // 将提取到的播放地址作为参数设置在 header() 函数中，重定向到该地址
    header("Location: {$playURL}");
    exit;
?>
