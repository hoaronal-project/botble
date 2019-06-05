<?php

namespace Botble\News\Providers;

use Botble\News\Models\News;
use Botble\News\Repositories\Eloquent\NewsService;
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
        $this->app->singleton(NewsInterface::class, function () {
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
        $this->loadViewsFrom(__DIR__ . '/../../../../themes/general/', 'main');
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
        \View::composer('plugins/news::layouts.right_col', function ($view) {
            $params = [];
            $params['featured'] = (new \Botble\News\Repositories\Eloquent\NewsService)->getFeaturedNews('categories');
            $params['recent'] = (new \Botble\News\Repositories\Eloquent\NewsService)->getRecentedNews('categories');
            $params['views'] = (new \Botble\News\Repositories\Eloquent\NewsService)->getTopViewNews('categories');
            return $view->with($params);
        });
    }
}
