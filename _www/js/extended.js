$(document).ready(function(){

	if($('.datepicker-birth').length){
        $( ".datepicker-birth" ).datepicker({
            minDate: new Date(1920, 1 - 1, 1),
            changeMonth: true,
            changeYear: true
        });
    }

    if($('.datepicker-pass').length){
        $( ".datepicker-pass" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    }

    $("#RegisterFormStep2_country_id").change(function(){
    	var v = $(this).val();
    	if (parseInt(v) > 0)
	    	$.get('/geo/regions', { country_id : v}, function(data){

	    		var $select = $("#RegisterFormStep2_region_id"); 
				$select.find('option').remove();
				$("#RegisterFormStep2_city_id").find('option').remove();

				$.each(data,function(key, value) {
					$select.append('<option value=' + key + '>' + value + '</option>');
				});

				setTimeout(function(){
					$("#RegisterFormStep2_region_id").trigger('refresh');
				}, 400);

	    	}, 'json');
    });

    $("#RegisterFormStep2_region_id").change(function(){
    	var v = $(this).val();
    	if (parseInt(v) > 0)
	    	$.get('/geo/cities', { region_id : v}, function(data){

	    		var $select = $("#RegisterFormStep2_city_id"); 
				$select.find('option').remove();

				$.each(data,function(key, value) {
					$select.append('<option value=' + key + '>' + value + '</option>');
				});

				setTimeout(function(){
					$("#RegisterFormStep2_city_id").trigger('refresh');
				}, 400);

	    	}, 'json');
    });

});