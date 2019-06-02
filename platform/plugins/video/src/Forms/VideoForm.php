<?php

namespace Botble\Video\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Video\Http\Requests\VideoRequest;

class VideoForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(VIDEO_MODULE_SCREEN_NAME)
            ->setValidatorClass(VideoRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [ // you can change "text" to "password", "email", "number" or "textarea"
                'label' => __('Name'),
                'label_attr' => ['class' => 'control-label required'], // Add class "required" if that is mandatory field
                'attr' => [
                    'placeholder' => __('You video name'),
                    'data-counter' => 120, // Maximum characters
                ],
            ])
            ->add('embed', 'textarea', [ // you can change "text" to "password", "email", "number" or "textarea"
                'label' => __('Embed Link'),
                'label_attr' => ['class' => 'control-label'], // Add class "required" if that is mandatory field
                'attr' => [
                    'data-counter' => 500, // Maximum characters
                ],
            ])
            ->add('status', 'select', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
