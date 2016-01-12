<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-slidereveal
 * @version 1.0
 */

namespace demogorgorn\slidereveal;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

/**
 *
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class SlideReveal extends \yii\base\Widget
{
    public $options = [];

    public $clientOptions = [];

    public $content = null;

    public $varName = null;

    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) 
            $this->options['id'] = $this->getId();

        echo Html::beginTag('div', $this->options);
    }

    /**
     * Runs the widget
     *
     * @return string|void
     */
    public function run()
    {
    	echo $this->content;

    	echo Html::endTag('div');

        $this->registerAssets();
    }

    /**
     * Register client assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        SlideRevealAsset::register($view);

        $id = $this->options['id'];
        $clientOptions = Json::encode($this->clientOptions, JSON_NUMERIC_CHECK);

        $js = "$('#{$id}').slideReveal({$clientOptions});" . PHP_EOL;
        if ($this->varName)
        	$js = "var {$this->varName} = " . $js;

        $this->getView()->registerJs($js, \yii\web\View::POS_END);
    }
}