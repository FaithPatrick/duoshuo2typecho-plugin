<?php
include 'common.php';
include 'header.php';
include 'menu.php';

if($_POST){
    $article_json =  $_FILES['article_json'];
    if ($article_json['error'] == UPLOAD_ERR_OK) {
        $temp_name = $article_json['tmp_name'];
        $file_name = $article_json['name'];
        $file_name = explode('.', $file_name);
        if (end($file_name) != 'xls' && end($file_name) != 'xlsx') {
            $err = '文件格式不正确,必须是.json后缀文件';
        }else{
            $file_name = time() . rand(1, 100) . '.' . end($file_name);
            //移动临时文件夹中的文件1到存放上传文件的目录，并重命名为真实名称
            move_uploaded_file($temp_name, '/' . $file_name);
            // $filePath = 'sites/pfizer_etraining/files/' . $file_name;
        }
    }

}
?>
    <div class="main">
        <div class="body container">
            <?php include 'page-title.php'; ?>
            <div class="clearfix" style="padding-left: 20px;">
                <ul class="typecho-option-tabs">
                    <?php if($err):?>
                    <div class="message popup success" style="padding-top:10px;height:20px;position:relative;display: block;"><ul style="margin:0 auto;width:250px;"><li><?php echo $err;?></li></ul></div>
                    <?php endif;?>
                </ul>
            </div>
            <div class="col-group typecho-page-main">
                <div class="row typecho-page-main" role="form">
                    <div class="col-mb-12 col-tb-8 col-tb-offset-2">
                        <form action="" method="post" enctype="application/x-www-form-urlencoded">
                            <ul class="typecho-option" id="typecho-option-item-seo_enabled-1">
                                <li>
                                    <label class="typecho-label">
                                        多说评论json文件</label>
                                    <span style="margin-bottom:5px">
<input type="file" name="comment_json">
</span>
                                    <p class="description">
                                        提示：json文件的获取你可以到<a href="http://www.duoshuo.com" target="_blank">多说网站</a>，打开「工具->导出数据」，勾选导出文章和评论，解压后上传export.json文件。</p>
                                </li>
                            </ul>
                            <ul class="typecho-option typecho-option-submit" id="typecho-option-item--3">
                                <li>
                                    <button type="submit" class="btn primary">
                                        开始同步</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include 'copyright.php';
include 'common-js.php';
include 'table-js.php';
?>
<?php include 'footer.php'; ?>