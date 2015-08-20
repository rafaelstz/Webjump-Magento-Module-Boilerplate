<?php

class Webjump_Developer_Helper_Data extends Mage_Core_Helper_Abstract {

	public function getBreadcrumbs($namePage, $sepateElement){
		$html = null;
		if(!($sepateElement)): $sepateElement = "&gt"; endif;
		if($namePage):
			$html = '<div class="breadcrumbs">
					    <ul>
					          <li class="home">
					            <a href="'.Mage::getBaseUrl().'" title="'.$this->__("Go to Home Page").'">'.$this->__("Home").'</a><span>'.$sepateElement.'</span>
					          </li>
					          <li class="page"><strong>'.$this->__($namePage).'</strong></li>
					     </ul>
					</div>';
		endif;
		return $html;
	}
}
