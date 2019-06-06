/*ë³   : .star-input*/
/*ì¶   : http://codepen.io/naradesign/pen/zxPbOw*/
var starRating = function(){
var $star = $(".star-input3"),
    $result = $star.find("output>b");
	
  	$(document)
	.on("focusin", ".star-input3>.input3", 
		function(){
   		 $(this).addClass("focus");
 	})
		 
   	.on("focusout", ".star-input3>.input3", function(){
    	var $this = $(this);
    	setTimeout(function(){
      		if($this.find(":focus").length === 0){
       			$this.removeClass("focus");
     	 	}
   		}, 100);
 	 })
  
    .on("change", ".star-input3 :radio", function(){
    	$result.text($(this).next().text());
  	})
    .on("mouseover", ".star-input3 label", function(){
    	$result.text($(this).text());
    })
    .on("mouseleave", ".star-input3>.input3", function(){
    	var $checked = $star.find(":checked");
    		if($checked.length === 0){
     	 		$result.text("0");
   		 	} else {
     	 		$result.text($checked.next().text());
    		}
  	});
};

starRating();