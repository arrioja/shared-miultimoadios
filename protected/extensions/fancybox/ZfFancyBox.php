<?php

class ZfFancyBox extends CWidget
{
	// @ string the id of the widget, since version 1.6
	public $id;
	// @ string the taget element on DOM
	public $target;
	// @ boolean whether to enable the easing functions. You must set the eansing on $config.
	public $easingEnabled=false;
	// @ boolean whether to enable mouse interaction
	public $mouseEnabled=true;
	// @ array of config settings for fancybox
	public $config=array();

	// function to init the widget
	public function init()
	{
		// if not informed will generate Yii defaut generated id, since version 1.6
		if(!isset($this->id))
			$this->id=$this->getId();
		// publish the required assets
		$this->publishAssets();
	}

	// function to run the widget
        public function run()
        {
		/*$config = CJavaScript::encode($this->config);
		Yii::app()->clientScript->registerScript($this->getId(), "
			$('$this->target').fancybox($config);
		");*/
        
	}

	// function to publish and register assets on page
	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
			Yii::app()->clientScript->registerCoreScript('jquery');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.fancybox-1.3.4.pack.js', CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerCssFile($baseUrl . '/jquery.fancybox-1.3.4.css');
			// if mouse actions enbled register the js
			if ($this->mouseEnabled) {
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.mousewheel-3.0.4.pack.js', CClientScript::POS_HEAD);
			}
			// if easing enbled register the js
			if ($this->easingEnabled) {
				Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.easing-1.3.pack.js', CClientScript::POS_HEAD);
			}
		} else {
			throw new Exception('EFancyBox - Error: Couldn\'t find assets to publish.');
		}
	}
}