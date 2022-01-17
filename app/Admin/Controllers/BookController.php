<?php

namespace App\Admin\Controllers;

use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;
use App\Models\BookSection;
use App\Models\BookAuthor;
use App\Models\BookYear;

class BookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Book';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Book());

        $grid->column('id', __('Id'));

        // $grid->column('section_id', __('Section id'));
        // $grid->column('author_id', __('Author id'));
        // $grid->column('year_id', __('Year id'));
        $grid->column('section.title', __('Section'));
        $grid->column('author.full_name', __('Author'));
        $grid->column('year.title', __('Year'));

        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('book_file', __('Book file'));
        // $grid->column('description', __('Description'));
        // $grid->column('image', __('Image'));
        // $grid->column('keywords', __('Keywords'));
        // $grid->column('book_size', __('Book size'));
        $grid->column('watched', __('Watched'));
        // $grid->column('active', __('Active'));
        // $grid->column('created_at', __('Created at'));
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
        $show = new Show(Book::findOrFail($id));

        $show->field('id', __('Id'));

        // $show->field('section_id', __('Section id'));
        // $show->field('author_id', __('Author id'));
        // $show->field('year_id', __('Year id'));
        $show->field('section.title', __('Section'));
        $show->field('author.full_name', __('Author'));
        $show->field('year.title', __('Year'));

        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('book_file', __('Book file'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('keywords', __('Keywords'));
        $show->field('book_size', __('Book size'));
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
        $form = new Form(new Book());

        $sections = BookSection::orderBy('id', 'DESC')->pluck('title','id')->all();
        $authors = BookAuthor::orderBy('id', 'DESC')->pluck('first_name','id')->all();
        $years = BookYear::orderBy('id', 'DESC')->pluck('title','id')->all();

        // $form->number('section_id', __('Section id'));
        $form->select('section_id', 'Section')->options($sections);

        // $form->number('author_id', __('Author id'));
        $form->select('author_id', 'Author')->options($authors);

        // $form->number('year_id', __('Year id'));
        $form->select('year_id', 'Year')->options($years);

        $form->text('title', __('Title'));
        // $form->text('slug', __('Slug'));
        $form->hidden('slug');
        $form->saving(function (Form $form) {
            $form->slug = Str::slug($form->title);
        });
        $form->file('book_file', __('Book file'))->rules('mimes:doc,docx,pdf');
        // $form->textarea('description', __('Description'));
        $form->ckeditor('description', __('Description'));
        $form->image('image', __('Image'))->rules('mimes:png,jpg,jpeg');
        $form->textarea('keywords', __('Keywords'));
        $form->text('book_size', __('Book size'));
        $form->number('watched', __('Watched'))->default(0);
        $form->switch('active', __('Active'))->default(1);

        return $form;
    }
}
