<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',

        'theme/lib/bootstrap/css/bootstrap.min.css',
        'theme/lib/font-awesome/css/font-awesome.min.css',
        'theme/lib/select2/css/select2.min.css',
        'theme/lib/jquery.bxslider/jquery.bxslider.css',
        'theme/lib/owl.carousel/owl.carousel.css',
        'theme/lib/jquery-ui/jquery-ui.css',
        'theme/css/animate.css',
        'theme/css/reset.css',
        'theme/css/style.css',
        'theme/css/responsive.css',
    ];
    public $js = [
        'theme/lib/jquery/jquery-1.11.2.min.js',
        'theme/lib/bootstrap/js/bootstrap.min.js',
        'theme/lib/select2/js/select2.min.js',
        'theme/lib/jquery.bxslider/jquery.bxslider.min.js',
        'theme/lib/owl.carousel/owl.carousel.min.js',
        'theme/lib/jquery.countdown/jquery.countdown.min.js',
        'theme/js/jquery.actual.min.js',
        'theme/js/theme-script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
