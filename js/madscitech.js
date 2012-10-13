// jQuery No Conflict Mark
//var $j = jQuery.noConflict();

// Function to for search field (Active and Deactive search field)
$(function() {
// Main Search Field			
$("#s")
    .val("Search...")
    .css("color", "#0066CC")
    .focus(function(){
        $(this).css("color", "black");
        if ($(this).val() == "Search...") {
            $(this).val("");
        }
    })
    .blur(function(){
        $(this).css("color", "#0066CC");
        if ($(this).val() == "") {
            $(this).val("Search...");
        }
    });
// Search field on E404 Pages	
$("#E404")
    .val("Search...")
    .css("color", "#000")
    .focus(function(){
        $(this).css("color", "black");
        if ($(this).val() == "Search...") {
            $(this).val("");
        }
    })
    .blur(function(){
        $(this).css("color", "#ccc");
        if ($(this).val() == "") {
            $(this).val("Search...");
        }
    });
});

    var onpremise, onPremiseInfo, remote, remoteInfo, online, onlineInfo;
    
    onPremise     =   $('#support-opt a.onpremise');
    onPremiseInfo =   $('#onpremise-info');
    remote        =   $('#support-opt .remote');
    remoteInfo    =   $('#remote-info');
    online        =   $('#support-opt .online');
    onlineInfo    =   $('#online-info');
    
      
    onPremise.click(function(ev){
      ev.preventDefault();
      onlineInfo.hide();
      remoteInfo.hide();
      onPremiseInfo.show();
      $(remote).add(online).removeClass("support_opt_selected");
      onPremise.addClass("support_opt_selected");
      $(this).dblclick(function(){
        window.location.replace($(this).attr("href"));
      });
    });  
    
    remote.click(function(ev){
      ev.preventDefault();
      onlineInfo.hide();
      onPremiseInfo.hide();
      remoteInfo.show();
      $(onPremise).add(online).removeClass("support_opt_selected");
      remote.addClass("support_opt_selected");
      $(this).dblclick(function(){
        window.location.replace($(this).attr("href"));
      });
    });
    
    online.click(function(ev){
      ev.preventDefault();
      remoteInfo.hide();
      onPremiseInfo.hide();
      onlineInfo.show();
      $(onPremise).add(remote).removeClass("support_opt_selected");
      online.addClass("support_opt_selected");
      $(this).dblclick(function(){
        window.location.replace($(this).attr("href"));
      });
    }); 
    
    
    $(document).ready(function(){
      // Setup Support Options Info onLoad
	onPremiseInfo.hide();
      remoteInfo.hide();
      onlineInfo.hide();
    }); 


// Live Chat Shit
/*function livechat()
{
	if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 && window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open('http://chat.madscitech.com/client.php?locale=en', 'webim', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=740,height=800,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;
}

// Add Link for Live Chat Link in Resource Section
$(document).ready(function() {
	$("a:[title='Mad Sci Tech Chat Support']").attr('onclick', 'livechat()');
});
*/
$(document).ready(function(){
    $("#thumbNav,#start-stop").fadeOut();
});  

// Setup the Auto Hidding Controls for FMA
$("#FMA .anythingSlider").hover(function() { 
			$("#thumbNav,#start-stop").fadeIn(); 
},		  
    	function() { 
    	  $("#thumbNav,#start-stop").fadeOut(); 
});
