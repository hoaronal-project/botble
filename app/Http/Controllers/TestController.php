<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/3/2019
 * Time: 11:12 PM
 */

namespace App\Http\Controllers;
use App\Models\PostCrawl;
use Botble\Blog\Models\Post;
use Goutte\Client;
use Symfony\Component\CssSelector\CssSelectorConverter;

include('../app/crawl/simple_html_dom.php');

class TestController
{
    public function test()
    {
        $client = new Client();
        $converter = new CssSelectorConverter();
        try {
//            for ($i = 12 ; $i <= 20 ; $i++){
                $crawler = $client->request('GET', 'https://viblo.asia/tags/javascript?page=5');
                dd(get_class_methods($crawler)); 
                $crawler->filterXPath($converter->toXPath('h3 a') ?? $converter->toXPath('h3'))->each(function ($node) use (
                    $client,
                    $converter
                ) {
                    $title = $node->text() ?? null;
                    $link = $node->selectLink($node->text())->link() ?? '';
                    $crawler = $client->click($link);
                    $url = $crawler->getUri();
                    $content = $crawler->filterXPath($converter->toXPath('.article-content__body'))->html() ?? null;
                    $des = $crawler->filterXPath($converter->toXPath('.article-content__body p'))->text() ?? null;
                    PostCrawl::create([
                        'name' => $title,
                        'description' => $des,
                        'content' => $content,
                        'image_link' => 'https://cdn0.tnwcdn.com/wp-content/blogs.dir/1/files/2018/04/CGWd8yk-796x398.jpg',
                        'author_id' => 1,
                        'format_type' => $url ?? '',
                        'category' => 'js',
                    ]);
                });
//            }
            echo 'success';
        } catch (\Throwable $throwable) {
            dd($throwable->getMessage());
        }
    }
}
