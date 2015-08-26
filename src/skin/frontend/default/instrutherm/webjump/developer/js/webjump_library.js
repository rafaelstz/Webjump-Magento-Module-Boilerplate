// WebjumpJS library v0.0.1
// For customize themes in development
var webjump = {

	// Debug for developers

	debug : function(fileFunction, descFunction){
			if (fileFunction && descFunction) {
				console.log("DEVELOPERS =========================================================================================");
				console.log("File of function: " + fileFunction);
				console.log("Description of funciton: " + descFunction);
				console.log("===================================================================================================");
				return true;
			}
			return false;
	},

	// If screen width < 768 isHidden = true
	toggle : function(element, content, slow, isHidden, screen) {
		if(slow) var velocity = "slow";
		if(!(screen)) screen = 768;
		var screenWidth = window.innerWidth;
		if( screenWidth < screen ){isHidden = true}
		if(isHidden){ jQuery(content).hide();}
		jQuery(element).click (
			function () {
				jQuery(content).toggle(velocity);
			}
		);
	},

	// Toggle list elements
	// listElement = ID
	// type (eg. dt)
	toggleList : function(listElement, type, velocity){
		jQuery(listElement).find(type).each(function(){
			var id = jQuery(this).id;
			var content = jQuery(this).next(id);
			content.hide();
			webjump.toggle(this, content, velocity);
		});
	},

	// Toogle Text
	toggleText : function(button, element, newText){
		var _element = jQuery(element);
		var oldText = _element.text();
		jQuery(button).click(function(){
			var atualText = _element.text();
			if(atualText == newText){
				toggleText = oldText
			}else{
				toggleText = newText
			}
			_element.text(toggleText);
		});
	},

	// Replace HTML
	replace : function(element, oldValue, newValue){
		jQuery(element).each(function() {
			var $this = jQuery(this);
			$this.html(jQuery(this).html().replace(oldValue, newValue));});
		},

	// Object var is optional
	clickToAddClass : function(element, className, object){
		if(!(object)){
			jQuery(element).click(function(){
				jQuery(this).toggleClass(className);
			});
		}else{
			jQuery(element).click(function(){
				jQuery(object).toggleClass(className);
			});
		}
	}
};
