$(document).ready(function(){
$('#rank_search_btn').live('click',function(){
if($('#rank_search').val() != ''){
var target = $('#rank_table .'+$('#rank_search').val());
$('#rank_table td#player').hide();
target.show();
if(!target.is(':visible')){
$('#rank_table_message').AddMSG('Personagem N&atilde;o Encontrado!','#FF3333','');
$('#rank_table td#player').show();
}
} else {
$('#rank_table td#player').show();
}
})
$('#rank_search').live('keypress',function(e){
  var code = (e.keyCode ? e.keyCode : e.which);
     switch(code){
	 case 13:$('#rank_search_btn').trigger('click');
	 }
})
jQuery.fn.AddMSG = function(e,c,bt){
if(c == ''){
   c = 'black';
}
if(bt == ''){
$(this).fadeIn(250).css({'color':c,'font-weight':'bold'}).html(e).delay(2550).hide('slow');
} else {
$(this).fadeIn(250,function(){$(bt).hide();}).css({'color':c,'font-weight':'bold'}).html(e).delay(2550).hide('slow',function(){$(bt).show();});
}
}
jQuery.CheckIeVersion = function() {
   var rv = -1; // Return value assumes failure.
   if (navigator.appName == 'Microsoft Internet Explorer')   
   {     
      var ua = navigator.userAgent;     
      var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
      if (re.exec(ua) != null)       
         rv = parseFloat( RegExp.$1 );   
   }   
return rv;
   }
})