<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CustomTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testExample()
    {
        $key_find = 'language-none';
        $key_replace= 'prettyprint';
        $file = public_path('a.html');
        $file_content = file_get_contents($file);
        $file_contents = str_replace($key_find,$key_replace,$file_content);
        file_put_contents($file,$file_contents);
        echo 'success';
    }
}
