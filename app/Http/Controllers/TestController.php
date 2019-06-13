<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/3/2019
 * Time: 11:12 PM
 */

namespace App\Http\Controllers;

use App\Models\PostCrawl;
use Botble\News\Models\News;
use Goutte\Client;
use Illuminate\Support\Str;
use Symfony\Component\CssSelector\CssSelectorConverter;
use PragmaRX\Tracker\Vendor\Laravel\Facade as Tracker;

include('../app/crawl/simple_html_dom.php');

class TestController
{
    public function test()
    {
        $client = new Client();
        $converter = new CssSelectorConverter();
        try {
            for ($i = 1; $i <= 40; $i++) {
                $crawler = $client->request('GET', 'https://viblo.asia/tags/laravel?page=' . $i . '');
                $crawler->filterXPath($converter->toXPath('h3 a') ?? $converter->toXPath('h3'))->each(function ($node
                ) use (
                    $client,
                    $converter
                ) {
                    try {
                        if ($node) {
                            $title = $node->text() ?? null;
                            $link = $node->selectLink($node->text())->link() ?? '';
                            $crawler = $client->click($link);
                            $url = $crawler->getUri();
                            $content = $crawler->filterXPath($converter->toXPath('.article-content__body'))->html() ?? null;
                            $content = '<div class="md-contents article-content__body my-2 flex-fill">' . $content . '</div>';
                            $des = $crawler->filterXPath($converter->toXPath('.article-content__body p'))->text() ?? null;
                            PostCrawl::create([
                                'name' => $title,
                                'description' => $des,
                                'content' => $content,
                                'image_link' => 'https://viblo.asia/uploads/bd4a537c-99ce-460f-b1c6-d3627cef79fe.png',
                                'author_id' => 1,
                                'format_type' => $url ?? '',
                                'category' => 'js',
                            ]);
                        }
                    } catch (\Exception $exception) {
                        return true;
                    }
                });
            }
            echo 'success';
        } catch (\Exception $e) {
            return true;
        }
    }

    public function crawlNews()
    {
//        \Artisan::call('migrate:refresh');
        $client = new Client();
        $converter = new CssSelectorConverter();
        $crawler = $client->request('GET', 'https://techtalk.vn/category/su-kien');
//            dd(get_class_methods($crawler));
        $crawler->filterXPath($converter->toXPath('h3.entry-title a') ?? $converter
                ->toXPath('h3.entry-title'))
            ->each(function ($node) use ($client, $converter) {
                try {
                    if (isset($node)) {
                        $title = $node->text() ?? null;
                        $link = $node->selectLink($node->text())->link() ?? '';
                        $crawler = $client->click($link);
                        $url = $crawler->getUri();
                        $image = $crawler->filterXPath($converter->toXPath('.td-post-featured-image img'))->attr('src');
                        $content = $crawler->filterXPath($converter->toXPath('.td-post-content'))->html() ?? null;
                        $des = $crawler->filterXPath($converter->toXPath('.td-post-content p'))->text() ?? null;
                        News::create([
                            'name' => $title,
                            'description' => $des,
                            'content' => $content,
                            'image' => $image,
                            'author_id' => 1,
                            'source' => $url ?? '',
                            'category_id' => 1,
                            'slug' => Str::slug($title)
                        ]);
                    } else {
                        return true;
                    }
                } catch (\Exception $e) {
                    set_error_handler(null);
                    set_exception_handler(null);
                    return true;
                }
            });
    }

    public function getTestViews()
    {
        $data = [];
        $data['list'] = PostCrawl::all();
        return view('test', $data);
    }

    public function vueViews()
    {
        return view('vue_load_more');
    }

    public function vueTest()
    {
        $data = PostCrawl::orderBy('id')->paginate(10);
        return response()->json($data);
    }

    public function getDetails($id = null)
    {
        $data = [];
        $data['post'] = PostCrawl::where('id', $id)->first();
        return view('detail', $data);
    }


    /**
     * @param bool $case_insensitive
     * @return bool
     */
    public function find_replace($case_insensitive = true)
    {
        $find = 'language-none';
        $replace = 'prettyprint';
        $file = public_path('a.html');
        if (!file_exists($file)) {
            return false;
        } else {
            $contents = file_get_contents($file);
            if ($case_insensitive) {
                $output = str_ireplace($find, $replace, $contents);
            } else {
                $output = str_replace($find, $replace, $contents);
            }
            $fopen = fopen($file, 'w');
            if (!$fopen) {
                return false;
            } else {
                $fwrite = fwrite($fopen, $output);
                if (!$fwrite) {
                    return false;
                } else {
                    return true;
                }
            }
            fclose($open);
            echo 'success';
        }
    }

}
