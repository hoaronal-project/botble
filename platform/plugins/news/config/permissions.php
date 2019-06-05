<?php

return [
    [
        'name' => 'News',
        'flag' => 'news.list',
    ],
    [
        'name' => 'Create',
        'flag' => 'news.create',
        'parent_flag' => 'news.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'news.edit',
        'parent_flag' => 'news.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'news.delete',
        'parent_flag' => 'news.list',
    ],
];