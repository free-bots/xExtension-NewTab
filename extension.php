<?php

declare(strict_types=1);

class NewTabExtension extends Minz_Extension
{

	public function init()
	{
		$this->registerController('item');

		Minz_View::appendScript($this->getFileUrl('script.js', 'js'));

		$this->registerHook(
			'nav_menu',
			array($this, 'addOpenInNewTabButton')
		);
	}

	public function addOpenInNewTabButton()
	{
		$icon_url = $this->getFileUrl('newTab.svg', 'svg');
		return '<button class="btn" id="newTab" title="Visit all websites">
			<img class="icon" src="' . $icon_url . '" loading="lazy" alt="️new tab">
		</button>';
	}
}
