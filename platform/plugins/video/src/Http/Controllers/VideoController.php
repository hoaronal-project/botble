<?php

namespace Botble\Video\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Video\Http\Requests\VideoRequest;
use Botble\Video\Repositories\Interfaces\VideoInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Video\Tables\VideoTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Video\Forms\VideoForm;
use Botble\Base\Forms\FormBuilder;

class VideoController extends BaseController
{
    /**
     * @var VideoInterface
     */
    protected $videoRepository;

    /**
     * VideoController constructor.
     * @param VideoInterface $videoRepository
     */
    public function __construct(VideoInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Display all videos
     * @param VideoTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function getList(VideoTable $table)
    {

        page_title()->setTitle(trans('plugins/video::video.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function getCreate(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/video::video.create'));

        return $formBuilder->create(VideoForm::class)->renderForm();
    }

    /**
     * Insert new Video into database
     *
     * @param VideoRequest $request
     * @return BaseHttpResponse
     */
    public function postCreate(VideoRequest $request, BaseHttpResponse $response)
    {
        $video = $this->videoRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(VIDEO_MODULE_SCREEN_NAME, $request, $video));

        return $response
            ->setPreviousUrl(route('video.list'))
            ->setNextUrl(route('video.edit', $video->id))
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
        $video = $this->videoRepository->findOrFail($id);

        event(new BeforeEditContentEvent(VIDEO_MODULE_SCREEN_NAME, $request, $video));

        page_title()->setTitle(trans('plugins/video::video.edit') . ' "' . $video->name . '"');

        return $formBuilder->create(VideoForm::class, ['model' => $video])->renderForm();
    }

    /**
     * @param $id
     * @param VideoRequest $request
     * @return BaseHttpResponse
     */
    public function postEdit($id, VideoRequest $request, BaseHttpResponse $response)
    {
        $video = $this->videoRepository->findOrFail($id);

        $video->fill($request->input());

        $this->videoRepository->createOrUpdate($video);

        event(new UpdatedContentEvent(VIDEO_MODULE_SCREEN_NAME, $request, $video));

        return $response
            ->setPreviousUrl(route('video.list'))
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
            $video = $this->videoRepository->findOrFail($id);

            $this->videoRepository->delete($video);

            event(new DeletedContentEvent(VIDEO_MODULE_SCREEN_NAME, $request, $video));

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
            $video = $this->videoRepository->findOrFail($id);
            $this->videoRepository->delete($video);
            event(new DeletedContentEvent(VIDEO_MODULE_SCREEN_NAME, $request, $video));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
