<?php

/**
 * @copyright Copyright &copy; Oleg Martemjanov, foreign.by, 2015
 * @package yii2-slidereveal
 * @version 1.0
 */

namespace demogorgorn\slidereveal;

/**
 * @author Oleg Martemjanov <demogorgorn@gmail.com>
 * @since 1.0
 */
class SlideRevealAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/slidereveal/dist/';
    public $js = [ 'jquery.slidereveal.min.js' ];
	
	public $depends = [
        'yii\web\JqueryAsset',
    ];
}