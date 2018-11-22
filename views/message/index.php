<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="telephone=no, address=no" name="format-detection">
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <title>微留言演示案例</title>
    <link rel="stylesheet" type="text/css" href="./message/msg.css" media="all"/>
</head>

<body id="message" onselectstart="return true;" ondragstart="return false;">

<div class="container">
    <div class="qiandaobanner">
        <a href="./message">
            <img src="./message/wall.jpg" style="width:100%;"/>
        </a>
    </div>

    <div class="cardexplain">
        <div class="window" id="windowcenter">
            <div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
            <div class="content">
                <div id="txt"></div>
            </div>
        </div>

        <div class="history">
            <div class="history-date">
                <ul>
                    <a><h2 class="first first1" style="position: relative;">点击留言</h2></a>

                    <li class="nob  mb">
                        <div class="beizhu">留言审核通过后才会显示在留言墙上！</div>
                    </li>

                    <?php foreach ($msgs as $msg) : ?>
                        <li class="green bounceInDown">
                            <h3>
                                <img src="./message/logo100x100.jpg">
                                <?= $msg->title ?>
                                <span><?= date(‘Y - m - d’, $msg->created_at) ?></span>
                                <div class="clr"></div>
                            </h3>

                            <dl>
                                <dt class="hfinfo"><?= $msg->desc ?></dt>
                            </dl>
                        </li>
                    <?php endforeach; ?>

                    <li class="green bounceInDown nob ly2" style="display:none;">
                        <?php

                            $form = ActiveForm::begin(
                                    ['action' => 'update',
                                        ]); ?>
                        <dl>
                            <dt>
                                <?= $form->field($model,'title')
                                    ->textInput(['class' => 'px', 'id' => 'uname', 'placeholder' => '请输入您的昵称'])
                                    ->label('') ?>
                            </dt>

                            <dt>
                                <?= $form->field($model,'desc')
                                    ->textarea(['class' => 'pxtextarea', 'id' => 'content', 'style' => 'height:100px;', 'placeholder' => '请输入留言内容'])
                                    ->label('') ?>
                            </dt>

                            <dt>
                                <?= Html::submitButton('提交留言', ['class' => 'btn btn-primary submit']) ?>
                            </dt>

                        </dl>
                        <?php ActiveForm::end() ?>

<!--                        <form action="" method="post" class="form1">-->
<!--                            <dl>-->
<!--                                <dt>-->
<!--                                    <input name="uname" type="text" class="px" id="uname" value=""-->
<!--                                           placeholder="请输入您的昵称">-->
<!--                                </dt>-->
<!---->
<!--                                <dt>-->
<!--                                    <textarea name="content" class="pxtextarea" style="height:60px;" id="content"-->
<!--                                              placeholder="请输入留言内容"></textarea>-->
<!--                                </dt>-->
<!---->
<!--                                <dt>-->
<!--                                    <a class="submit" href="javascript:void(0);">提交留言</a>-->
<!--                                </dt>-->
<!--                            </dl>-->
<!--                        </form>-->

                    </li>

                    <a><h2 class="first first2" style="position:relative;">点击留言</h2></a>

                </ul>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="./message/jquery.js"></script>

<script type="text/javascript">

    $(function(){

        //留言表单显示切换

        $(".first1").click(function(){
            $(".ly1").slideToggle();
        });

        $(".first2").click(function(){
            $(".ly2").slideToggle();

        });

        //点击提交留言a标签，则提交表单

        $(".submit").click(function(){

            //判断用户名和密码不能为空

            const uname = $("#uname").val();

            const content = $("#content").val();

            if (uname == '' || content == '') {
                alert("请输入昵称或留言内容");
                return;
            }

            //提交表单

            $(".form1").submit();

        });

});

</script>

</body>

</html>