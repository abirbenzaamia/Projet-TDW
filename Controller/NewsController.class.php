<?php
require_once("Model/NewsModel.class.php");
require_once("View/NewsView.class.php");


class NewsController{
    function displayNews(){
        $NewsMdl = new NewsModel();
        $res = $NewsMdl->getNews();
        $NewsView = new NewsView();
        $NewsView->displayNews($res);

    }
}
?>