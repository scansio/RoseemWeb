(function($)
{
	$(document).ready(function()
	{
		$(".jcm-mod-url").click(function(){
			var url = $(this).attr("data-href");
			window.location = url;
		});
	})
})(jQuery);