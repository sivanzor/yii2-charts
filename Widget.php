<?php
 
namespace visiobit\charts;

use Yii;
use yii\web\View;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
 

class Widget extends yii\base\Widget
{ 
    public $options = []; 
    public $width = '640px'; 
    public $height = '400px'; 
    public $language;  
    public $chartConfiguration = []; 
    protected $_chartDivId;


    
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = 'chartdiv-' . $this->getId();
        }
        $this->chartDivId = $this->options['id'];
        parent::init();
    }

    public function run()
    {
        $this->makeChart();
        $this->options['style'] = "width: {$this->width}; height: {$this->height};";
        echo Html::tag('div', '', $this->options);
    }

    protected function makeChart()
    {
        if (!isset($this->chartConfiguration['language']))
        {
            $this->chartConfiguration['language'] = $this->language ? $this->language : Yii::$app->language;
        }
        $assetBundle = AmChartAsset::register($this->getView());
        $assetBundle->language = $this->chartConfiguration['language'];
        if (!isset($this->chartConfiguration['pathToImages']))
        {
            $this->chartConfiguration['pathToImages'] = $assetBundle->baseUrl . '/images/';
        }
        $chartConfiguration = json_encode($this->chartConfiguration);
        $js = "AmCharts.makeChart('{$this->chartDivId}', {$chartConfiguration});";
        $this->getView()->registerJs($js, View::POS_READY);
    }

    protected function setChartDivId($value)
    {
        $this->_chartDivId = $value;
    }

    protected function getChartDivId()
    {
        return $this->_chartDivId;
    }
}