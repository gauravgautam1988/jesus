$(document).ready(function(){
	$('#search_submit').click(function(e) {
		e.preventDefault();
		var querystring = "find/findemp?";
		if ($('#firstname').val() != ''){
			querystring += "firstname=" + $('#firstname').val();
		}
		if ($('#lastname').val() != ''){
			querystring += "&lastname=" + $('#lastname').val();
		}
		if ($('#department').val() != ''){
			querystring += "&department=" + $('#department').val();
		}
		if ($('#title').val() != ''){
			querystring += "&title=" + $('#title').val();
		}
		$.getJSON(querystring,
			null,
			function(data){
			$.each(data, function() {
				$.each(this, function(i, item) {
					$('.search_results tbody').append(
					'<tr>' +
					'<td>' + item.firstname + '</td>' +
					'<td>' + item.lastname + '</td>' +
					'<td>' + item.dept + '</td>' +
					'<td>' + item.jobtitle + '</td>' +
					'</tr>'
					);
				});
			});
		});
	});
});