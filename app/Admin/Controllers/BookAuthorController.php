<?php

namespace App\Admin\Controllers;

use App\Models\BookAuthor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class BookAuthorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BookAuthor';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BookAuthor());

        $grid->column('id', __('Id'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('birthday', __('Birthday'));
        // $grid->column('image', __('Image'));
        // $grid->column('address', __('Address'));
        // $grid->column('phone', __('Phone'));
        // $grid->column('email', __('Email'));
        $grid->column('active', __('Active'));
        $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(BookAuthor::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('birthday', __('Birthday'));
        $show->field('image', __('Image'));
        $show->field('address', __('Address'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
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
        $form = new Form(new BookAuthor());

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->date('birthday', __('Birthday'))->format('DD-MM-YYYY');
        $form->image('image', __('Image'));
        $form->text('address', __('Address'));
        $form->mobile('phone', __('Phone'))->options(['mask' => '99 999 99 99']);
        $form->email('email', __('Email'));
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
