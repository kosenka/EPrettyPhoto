<?php

class EPrettyPhoto extends CComponent
{
        public $selector;
        
	const THEME_FACEBOOK 		= "facebook";
	const THEME_DARK_ROUNDED	= "dark_rounded";
	const THEME_DARK_SQUARE		= "dark_square";
	const THEME_LIGHT_ROUNDED 	= "light_rounded";
	const THEME_LIGHT_SQUARE	= "light_square";

	const PRETTY_SINGLE 	= 1; // create pretty for single links?
	const PRETTY_GALLERY 	= 2; // create pretty gallery?

	private function scriptName($css=false) {
		return $css ? '/css/prettyPhoto.css' : 'jquery.prettyPhoto.js';
	}

	protected static function registerScript(){
		$cs = Yii::app()->clientScript;
		$cs->registerCoreScript('jquery');
		$assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/assets',false,-1,YII_DEBUG);
		$cs->registerScriptFile($assets.'/'.self::scriptName());
		$cs->registerCssFile($assets .self::scriptName(true));
	}

	public static function addPretty($jsSelector=".gallery a", $gallery=self::PRETTY_GALLERY, $theme=self::THEME_FACEBOOK){

		self::registerScript();

                Yii::app()->clientScript->registerScript(time(),'$("'.$jsSelector.'").prettyPhoto({theme:\''.$theme.'\'});',CClientScript::POS_READY);
	}

}
