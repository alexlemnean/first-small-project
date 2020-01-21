$('#addmovie').submit(function(){
	return false;
});
$('#insert').click(function(){
	$.post(		
		$('#addmovie').attr('action'),
		$('#addmovie :input').serializeArray(),
		function(result){
			$('#result').html(result);
		}
	);
});