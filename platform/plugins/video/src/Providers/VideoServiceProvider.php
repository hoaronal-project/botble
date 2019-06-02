<?php

namespace Botble\Video\Providers;

use Botble\Video\Models\Video;
use Illuminate\Support\ServiceProvider;
use Botble\Video\Repositories\Caches\VideoCacheDecorator;
use Botble\Video\Repositories\Eloquent\VideoRepository;
use Botble\Video\Repositories\Interfaces\VideoInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class VideoServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    public function register()
    {
        $this->app->bind(VideoInterface::class, function () {
            return new VideoCacheDecorator(new VideoRepository(new Video));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/video')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-video',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/video::video.name',
                'icon'        => 'fa fa-list',
                'url'         => route('video.list'),
                'permissions' => ['video.list'],
            ]);
        });
    }
}
