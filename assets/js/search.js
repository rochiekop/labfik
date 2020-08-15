$(document).ready(function () {
	var keyword = document.getElementById('keyword');
	var container = document.getElementById('container');
	$(".dropdown-item").click(function () {
		var text = $(this).text();
		$(".filter").text(text)
	});

	// load_data();

	function load_data(query) {
		$.ajax({
			url: '../search/fetch',
			method: "POST",
			data: {
				query: query
			},
			success: function (data) {
				$('#container').html(data);
				// console.log(data)
			}
		});
	}
	keyword.addEventListener('keyup', function () {
		var keyword = $(this).val();
		if (keyword != '') {
			load_data(keyword);
			a
		}
	})
	
});

