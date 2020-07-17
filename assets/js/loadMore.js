$(document).ready(function () {
	$(".feed-item").slice(0, 3).show();
	if ($(".feed-item:hidden").length != 0) {
		$("#loadMore").show();
	}
	$("#loadMore").on('click', function (e) {
		e.preventDefault();
		$(".feed-item:hidden").slice(0, 3).slideDown();
		if ($(".feed-item:hidden").length == 0) {
			$("#loadMore").fadeOut('slow');
		}
	});
});
