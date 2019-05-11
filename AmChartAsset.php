<?php 

namespace sivanzor\yii2_charts;

use yii\web\AssetBundle;
use Yii;
 
class ChartAsset extends AssetBundle
{
    public $language;
    public $sourcePath = '@sivanzor/yii2_charts/assets';
    public $css = [];
    public $js = [
        'charts.js',
        'core.js',
        'maps.js', 
        'deps\canvg.js', 
        'deps\pdfmake.js', 
        'deps\xlsx.js', 
        'plugins\forceDirected.js', 
        'plugins\regression.js', 
        'plugins\sliceGrouper.js', 
        'plugins\sunburst.js', 
        'plugins\wordCloud.js',  
        'themes\amcharts.js', 
        //'themes\amchartsdark.js', 
        //'themes\animated.js', 
        //'themes\dark.js', 
        //'themes\dataviz.js', 
        //'themes\frozen.js', 
        //'themes\kelly.js', 
        //'themes\material.js', 
        //'themes\moonrisekingdom.js', 
        //'themes\spiritedaway.js', 
    ];
    //public $depends = [
    //    'yii\web\JqueryAsset',
    //    'yii\bootstrap\BootstrapAsset',
    //];

    public function registerAssetFiles($view)
    {
        $language = $this->language ? $this->language : Yii::$app->language;
        $this->js[] = 'lang/' . $language . '.js';
        parent::registerAssetFiles($view);
    }
}