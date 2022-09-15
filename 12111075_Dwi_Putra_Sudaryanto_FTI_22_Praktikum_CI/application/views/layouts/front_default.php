<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="<?php echo $pageDescription;?>" />
  <meta name="keywords" content="<?php echo $pageMeta;?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $pageTitle;?> | 12111075 - Dwi Putra Sudaryanto</title>
</head>
<body>
    <div class="menu">
        <?php echo anchor('site/index','HOME')?> |
        <?php echo anchor('site/contact','CONTACT')?> |
        <?php echo anchor('site/about','ABOUT')?>
    </div>
    <hr /><br />
    <?php echo $content;?>
    <br /><hr />
    &copy; 2015 | Dwi Putra Sudaryanto | 12111075 | 22 | FTI
    <hr />
</body>
</html>
