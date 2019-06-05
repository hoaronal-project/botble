<?php

namespace Botble\News\Providers;

use Botble\News\Models\News;
use Illuminate\Support\ServiceProvider;
use Botble\News\Repositories\Caches\NewsCacheDecorator;
use Botble\News\Repositories\Eloquent\NewsRepository;
use Botble\News\Repositories\Interfaces\NewsInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class NewsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(NewsInterface::class, function () {
            return new NewsCacheDecorator(new NewsRepository(new News));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/news')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-news',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/news::news.name',
                'icon'        => 'fa fa-list',
                'url'         => route('news.list'),
                'permissions' => ['news.list'],
            ]);
        });
    }
}
