<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use App\Model\GoodsModel;
use Encore\Admin\Show;


class GoodsController extends Controller
{
    use HasResourceActions;
    public function index(Content $content)
    {
        return $content
            ->header('商品管理')
            ->description('商品列表')
            ->body($this->grid());
    }

    protected function grid()
    {
        $grid = new Grid(new GoodsModel());

        $grid->model()->orderBy('goods_id','desc');     //倒序排序

        $grid->goods_id('商品ID');
        $grid->goods_name('商品名称');
        $grid->goods_num('库存');
        $grid->price('价格');
        $grid->goods_img('商品图片')->display(function($data){
            return $data;
        });
        $grid->created_at('添加时间');

        return $grid;
    }

    public function edit($id, Content $content)
    {

        return $content
            ->header('商品管理')
            ->description('编辑')
            ->body($this->form()->edit($id));
    }



    //创建
    public function create(Content $content)
    {

        return $content
            ->header('商品管理')
            ->description('添加')
            ->body($this->form());
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    protected function detail($id)
    {
        $show = new Show(GoodsModel::findOrFail($id));

        $show->goods_id('商品ID');
        $show->goods_name('商品名称');
        $show->goods_num('库存');
        $show->price('价格');
        $show->created_at('添加时间');
        return $show;
    }

//    public function update($id)
//    {
//        echo '<pre>';print_r($_POST);echo '</pre>';
//    }

//    public function store()
//    {
//        echo '<pre>';print_r($_POST);echo '</pre>';
//    }
//
//
//
//    public function show($id)
//    {
//        echo __METHOD__;echo '</br>';
//    }

    //删除
//    public function destroy($id)
//    {
//
//        $response = [
//            'status' => true,
//            'message'   => 'ok'
//        ];
//        return $response;
//    }



    protected function form()
    {
        $form = new Form(new GoodsModel());

        $form->display('goods_id', '商品ID');
        $form->text('goods_name', '商品名称');
        $form->number('goods_num', '库存');
        $form->currency('price', '价格')->symbol('¥');
        $form->ckeditor('goods_img','商品图片');

        return $form;
    }

}