<?php

namespace App\Admin\Controllers;

use App\Models\Advertisement;
use Encore\Admin\Controllers\AdminController;
use Illuminate\Support\Str;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AdvertisementController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Advertisement';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Advertisement());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        // $grid->column('description', __('Description'));
        $grid->column('watched', __('Watched'));
        $grid->column('active', __('Active'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Advertisement::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('watched', __('Watched'));
        $show->field('active', __('Active'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Advertisement());

        $form->text('title', __('Title'));
        // $form->text('slug', __('Slug'));
        $form->hidden('slug');
        $form->saving(function (Form $form) {
            $form->slug = Str::slug($form->title);
        });
        // $form->textarea('description', __('Description'));
        $form->ckeditor('description', __('Description'));
        $form->number('watched', __('Watched'))->default(0);
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
