<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-slidereveal
 * @version 1.0
 */

namespace demogorgorn\slidereveal;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 *
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class SlideReveal extends \yii\base\Widget
{
    public $options = [];

    public $clientOptions = [];

    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) 
            $this->options['id'] = $this->getId();
    }

    /**
     * Runs the widget
     *
     * @return string|void
     */
    public function run()
    {
        $this->registerAssets();

        echo Html::tag('div', $this->content, $this->options);

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

        $js = "$('#{$id}').slideReveal({$clientOptions})";

        $this->getView()->registerJs($js, \yii\web\View::POS_END);
    }
}