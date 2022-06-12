<?php
/**
 * @package AhmedPlugin
 */

class AhmedPluginDeactivate{
	public static function deactivate(){
		flush_rewrite_rules();
	}
}
