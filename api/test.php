<?php
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

$id = strtolower($_GET['id'] ?? 'ws');
$id = $ids[$id] ?? '';

$t = time();
$type_id = '151';
$salt = 'TtJSg@2g*$K4PjUH';
$sign = substr(md5("$id$type_id$t$salt"), 0, 8);

$bstrURL = "https://pc.api.btime.com/video/play?from=pc&id=$id&type_id=$type_id&timestamp=$t&sign=$sign";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $bstrURL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ['User-Agent: Mozilla/5.0'],
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
]);
$data = curl_exec($ch);
curl_close($ch);

$json = json_decode($data);
$playURL = $json->data->video_stream[0]->stream_url ?? '';
$playURL = strrev(base64_decode(base64_decode($playURL)));

if ($playURL) {
    header("Location: $playURL");
}
?>
