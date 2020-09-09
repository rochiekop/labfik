$(".item").click(function () {
	var text = $(this).text();
	$("#filter").text(text)
});
alert(text)

function searchpengajuantaadminlaa() {
	$("#keyword").keyup(function () {
		// Declare variables
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("keyword");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");

		if (text == "Nama") {
			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[2];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
	});
}
