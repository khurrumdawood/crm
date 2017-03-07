
/******* Phone Navigation Button ******/
$(document).ready(function() {
	$("#ph_menu").click(function () {

		var phnavigation = document.getElementById("phnavigation");	
		
		if(phnavigation.style.height=='0px'){
			phnavigation.style.height = "auto";
		}
		else {
			phnavigation.style.height = "0px";
			
			$("#phnavigation div").removeClass('phnavigation_open').addClass("phnavigation_close");
			}
	})
	
	/******* Phone Navigation Menu ******/
	$("#phnavi_div1, #phnavi_div2, #phnavi_div3").click(function () {
		clss = $(this).attr('class');
		if(clss=="phnavigation_close"){
			$(this).removeClass('phnavigation_close').addClass("phnavigation_open");
			} else {
				$(this).removeClass('phnavigation_open').addClass("phnavigation_close");
		}
	})
	
	/******* Phone Navigation Products View List ******/
	$("#porlist_gridlist").click(function () {
		//alert("test!");
		var girdview = document.getElementById("prolist");
		$(girdview).removeClass('prolist').addClass("prolist2");
	})
	/******* Phone Navigation Products View Box ******/
	$("#porlist_gridbox").click(function () {
		var girdview = document.getElementById("prolist");
		$(girdview).removeClass('prolist2').addClass("prolist");
	})
	//
	//
	//
});



