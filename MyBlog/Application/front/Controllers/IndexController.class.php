<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 9:42
 */

class IndexController extends BaseController{

    /**
     * 前台首页左侧的排行榜的加载
     */
    public function indexAction(){
        $articleModel = ModelFactory::getModel("ArticleModel");
        //获取阅读量排行榜
        $watchSize = 5;  //显示的内容数量
        $watchList = $articleModel->watchList($watchSize);
        //获取点赞排行榜
        $likeSize = 5;  //显示的内容数量
        $likeList = $articleModel->likeList($likeSize);
        //获取文章分类列表
        $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
        $typeList = $articleTypeModel->getArticleTypesList();
         require VIEW_PATH."index.php";
    }

    /**
     * 博客详情页面的加载
     */
    public function blog_detailAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail.php";
    }


    /**
     * 博客详情内容的加载
     */
    public function blog_detail_contentAction(){
        $id = @$_GET['id'];
        //该博文id的阅读量增加
        $articleModel = ModelFactory::getModel("ArticleModel");
        $articleModel->addPageView($id);
        require VIEW_PATH."blog_detail_content.php";
    }


    /**
     * 博客顶部的加载
     */
    public function blog_topAction(){
        require VIEW_PATH."blog.php";
    }


    /**
     * 博客右侧的加载
     */
    public function right_panelAction(){
        require VIEW_PATH."right_panel.php";
    }
}