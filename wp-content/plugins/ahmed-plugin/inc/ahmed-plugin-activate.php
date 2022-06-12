<?php
/**
 * @package AhmedPlugin
 */

class AhmedPluginActivate{
	public static function activate(){
		flush_rewrite_rules();
	}
}
