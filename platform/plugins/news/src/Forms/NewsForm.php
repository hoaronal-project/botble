<?php

namespace Botble\News\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\News\Http\Requests\NewsRequest;

class NewsForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        $this
            ->setModuleName(NEWS_MODULE_SCREEN_NAME)
            ->setValidatorClass(NewsRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label' => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'placeholder' => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('image', 'text', [
                'label' => __('Image'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => __('Image feature'),
                    'data-counter' => 190,
                ],
            ])
            ->add('source', 'text', [
                'label' => __('Source'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'placeholder' => __('Source'),
                    'data-counter' => 190,
                ],
            ])
            ->add('description', 'textarea', [ // you can change "text" to "password", "email", "number" or "textarea"
                'label' => __('Description'),
                'label_attr' => ['class' => 'control-label'], // Add class "required" if that is mandatory field
                'attr' => [
                    'rows' => 3,
                    'placeholder' => trans('plugins/news::news.description'),
                    'data-counter' => 500, // Maximum characters
                ],
            ])
            ->add('content', 'editor', [
                'label' => __('Content'),
                'label_attr' => ['class' => 'control-label'],
                'attr' => [
                    'rows' => 6,
                    'placeholder' => 'Content here',
                    'with-short-code' => true,
                ],
            ])
            ->add('status', 'select', [
                'label' => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => BaseStatusEnum::labels(),
            ])
            ->add('is_featured', 'onOff', [
                'label' => __('Nổi bật'),
                'label_attr' => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('ordering', 'number', [ // you can change "text" to "password", "email", "number" or "textarea"
                'label' => __('Ordering'),
                'label_attr' => ['class' => 'control-label'], // Add class "required" if that is mandatory field
                'default_value' => 0,
                'attr' => [
                    'placeholder' => __('Sắp xếp'),
                    'data-counter' => 10, // Maximum characters
                ],
            ])
            ->add('category_id', 'select', [
                'label' => __('Category'),
                'label_attr' => ['class' => 'control-label required'],
                'attr' => [
                    'class' => 'form-control select-full',
                ],
                'choices' => [
                    '1' => 'Sự kiện',
                    '2' => 'Công nghệ',
                    '3' => 'Lập trình',
                    '4' => 'Tool & tips',
                    '5' => 'Linh tinh',
                    '6' => 'Chuyện của Dev',
                ],
            ])
            ->setBreakFieldPoint('status');
    }
}
