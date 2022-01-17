<?php

namespace App\Admin\Controllers;

use App\Models\BookSection;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class BookSectionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BookSection';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BookSection());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
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
        $show = new Show(BookSection::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
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
        $form = new Form(new BookSection());

        $form->text('title', __('Title'));
        // $form->text('slug', __('Slug'));
        $form->hidden('slug');
        $form->saving(function (Form $form) {
            $form->slug = Str::slug($form->title);
        });
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
