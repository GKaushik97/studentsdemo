<?php
/**
 * Template
 * 
 * Template usage
 *  $data = array(
 *      'title' => 'Main Title',                                // 
 *      'page_layout' => 1,                                     // Optional [0 or 1] for fullscreen pages like dahsboards etc,.
 *      'page_title' => 'Page Tilte',                           //
 *      'breadcrumb' => [['name' => 'name', 'url' => 'url']],   //
 *      'js' => [file1, file2,],                                //
 *      'css' => [file1, file,],                                //
 *  );
 * @author HighGo
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= esc(PROJECT_TITLE) ?> : <?= esc($title) ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS files -->
        <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT; ?>bootstrap-5.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT; ?>css/template.css">
        <!-- JS files -->
        <script type="text/javascript" src="<?php echo WEBROOT;?>js/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo WEBROOT;?>bootstrap-5.3.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo WEBROOT;?>js/main.js"></script>
    </head>
    <body>
        <?php
        $page_layout = isset($page_layout) ? $page_layout : 0;
        ?>
        <header>
            <div>
                <?php // Load main navigation menu ?>
                <?= view_cell('Menu::topMenu') ?>
            </div>
        </header>
        <div class="page-body">
            <?php if($page_layout == 0): ?>
                <div class="page-title">
                    <h3><?= esc($page_title); ?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= esc(WEBROOT) ?>">Home</a></li>
                            <?php
                            if(isset($breadcrumb)) {
                                foreach($breadcrumb as $breadcrumb_item) {
                                    ?><li class="breadcrumb-item"><a href="<?= esc(WEBROOT) . esc($breadcrumb_item['url']) ?>"><?= esc($breadcrumb_item['name']) ?></a></li><?
                                }
                            }
                            ?>
                            <li class="breadcrumb-item active" aria-current="page"><?= esc($page_title); ?></li>
                        </ol>
                    </nav>
                </div>
            <?php endif; ?>
            <div class="page-content"><?= $this->renderSection('content'); ?></div>
        </div>
        <footer class="fixed-bottom">
            <div class="text-center">
                <?php // Load footer navigation menu ?>
                <?= view_cell('Menu::footerMenu') ?>
                &copy;<?= date('Y');?> HighGo&reg;
            </div>
        </footer>
    </body>
</html>