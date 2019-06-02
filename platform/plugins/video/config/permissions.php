<?php

return [
    [
        'name' => 'Video',
        'flag' => 'video.list',
    ],
    [
        'name' => 'Create',
        'flag' => 'video.create',
        'parent_flag' => 'video.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'video.edit',
        'parent_flag' => 'video.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'video.delete',
        'parent_flag' => 'video.list',
    ],
];