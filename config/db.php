<?php
return [
    'master' => [
        'name'        => 'master',
        'uri'         => [
            '127.0.0.1:13306/mysql?user=root&password=123456'
        ],
        'minActive'   => 8,
        'maxActive'   => 8,
        'maxWait'     => 8,
        'timeout'     => 8,
        'maxIdleTime' => 60,
        'maxWaitTime' => 3,
    ]
];
