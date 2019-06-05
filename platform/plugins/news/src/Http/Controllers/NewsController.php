<?php

namespace Botble\News\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\News\Forms\NewsForm;
use Botble\News\Http\Requests\NewsRequest;
use Botble\News\Repositories\Interfaces\NewsInterface;
use Botble\News\Tables\NewsTable;
use Theme;
use Exception;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    /**
     * @var NewsInterface
     */
    protected $newsRepository;

    /**
     * NewsController constructor.
     * @param NewsInterface $newsRepository
     */
    public function __construct(NewsInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Display all news
     * @param NewsTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function getList(NewsTable $table)
    {

        page_title()->setTitle(trans('plugins/news::news.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/news::news.create'));

        return $formBuilder->create(NewsForm::class)->renderForm();
    }

    /**
     * Insert new News into database
     *
     * @param NewsRequest $request
     * @return BaseHttpResponse
     */
    public function postCreate(NewsRequest $request, BaseHttpResponse $response)
    {
        $news = $this->newsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(NEWS_MODULE_SCREEN_NAME, $request, $news));

        return $response
            ->setPreviousUrl(route('news.list'))
            ->setNextUrl(route('news.edit', $news->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function getEdit($id, FormBuilder $formBuilder, Request $request)
    {
        $news = $this->newsRepository->findOrFail($id);

        event(new BeforeEditContentEvent(NEWS_MODULE_SCREEN_NAME, $request, $news));

        page_title()->setTitle(trans('plugins/news::news.edit') . ' "' . $news->name . '"');

        return $formBuilder->create(NewsForm::class, ['model' => $news])->renderForm();
    }

    /**
     * @param $id
     * @param NewsRequest $request
     * @return BaseHttpResponse
     */
    public function postEdit($id, NewsRequest $request, BaseHttpResponse $response)
    {
        $news = $this->newsRepository->findOrFail($id);

        $news->fill($request->input());

        $this->newsRepository->createOrUpdate($news);

        event(new UpdatedContentEvent(NEWS_MODULE_SCREEN_NAME, $request, $news));

        return $response
            ->setPreviousUrl(route('news.list'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function getDelete(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $news = $this->newsRepository->findOrFail($id);

            $this->newsRepository->delete($news);

            event(new DeletedContentEvent(NEWS_MODULE_SCREEN_NAME, $request, $news));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function postDeleteMany(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $news = $this->newsRepository->findOrFail($id);
            $this->newsRepository->delete($news);
            event(new DeletedContentEvent(NEWS_MODULE_SCREEN_NAME, $request, $news));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    /**
     * Get news page
     * @return \Botble\Theme\Facades\Response|\Illuminate\Http\Response|\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getNews()
    {
        $params = [];
        $params['news'] =  $this->newsRepository->all(['categories'])->take(20);
        if (!empty($params)) {

            return Theme::scope('news_index', $params, 'plugins/news::news_index')->render();
        } else {
            return abort(404);
        }
    }
}
