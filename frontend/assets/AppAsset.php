<?php
namespace frontend\assets;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    
    //public $sourcePath ='@bower/corlate/';
    public $sourcePath ='@bower/mPurpose/';
    public $css = [
        //css for corlate
       /* 'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/animate.min.css',
        'css/prettyPhoto.css',
        'css/main.css',
        'css/responsive.css',*/
        //css for mPurpose
        'css/bootstrap.min.css',
        'css/icomoon-social.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800',
        'css/leaflet.css',
        'css/main.css',
    ];
    public $js = [
        //js for corlate
       /* 'js/jquery.js',
        'js/bootstrap.min.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.isotope.min.js',
        'js/main.js',
        'js/wow.min.js',*/
        //js for mPurpose
        'js/modernizr-2.6.2-respond-1.1.0.min.js',
        'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
        'js/jquery-1.9.1.min.js',
        'js/bootstrap.min.js',
        'http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js',
        'js/jquery.fitvids.js',
        'js/jquery.sequence-min.js',
        'js/jquery.bxslider.js',
        'js/main-menu.js',
        'js/template.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
