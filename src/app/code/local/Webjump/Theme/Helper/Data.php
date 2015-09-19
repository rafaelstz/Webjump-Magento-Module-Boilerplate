<?php
/**
 * Created by PhpStorm.
 * User: rafaelcg
 * Date: 10/06/15
 * Time: 16:00
 */
class Webjump_Theme_Helper_Data extends Mage_Core_Helper_Abstract {

	const XML_PATH_STATUS_META_COLOR =  'webjump_theme/meta_color/meta_status';
	const XML_PATH_META_COLOR = 'webjump_theme/meta_color/meta_color';
	const XML_PATH_META_COLOR_APPLE = 'webjump_theme/meta_color/meta_color_apple';

	public function getStatusMetaColor(){
		return Mage::getStoreConfig(self::XML_PATH_STATUS_META_COLOR);
	}

	public function getMetaColorApple(){
		$statusMetaColor = $this->getStatusMetaColor();
		$metaColorApple = Mage::getStoreConfig(self::XML_PATH_META_COLOR_APPLE);
		if($statusMetaColor ==  1 AND $metaColorApple){
			$html = '<!-- iOS Safari -->
					<meta name="apple-mobile-web-app-status-bar-style" content="'.$metaColorApple.'">';
			return $html;
		}
		return null;
	}

	public function getMetaColor(){
		$statusMetaColor = $this->getStatusMetaColor();
		$metaColor = Mage::getStoreConfig(self::XML_PATH_META_COLOR);
		$metaColorApple = $this->getMetaColorApple();

		if($statusMetaColor == 1 AND $metaColor) {
			$html =     $metaColorApple.'
						<!-- Chrome & Firefox OS -->
						<meta name="theme-color" content="'.$metaColor.'">
						<!-- Windows Phone -->
						<meta name="msapplication-navbutton-color" content="'.$metaColor.'">
						';

			return $html;
		}
		return null;
	}
}
