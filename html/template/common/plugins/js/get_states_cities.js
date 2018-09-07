$(document).ready(function() {
	var base_url = window.location.protocol + "//" + window.location.host +"/";
	
	$("#country").typeahead({
		//minLength: 2,
		
        source: function (query, process) {
        	var t=$("input[name='csrf_test_name']").val();			
			objects = [];
			map = {};
			
			$("#state").val("");
			$("#city").val("");
			$("#state_code").val("");

			$.ajax({
				url: base_url+"home/get_cities_state/",
				data: {name: query, country:"1", csrf_test_name:t},
				dataType: "json",
				type: "POST",
				success: function (data) {
					$.each(data, function(i, object) {
						map[object.country_name] = object;
						objects.push(object.country_name);						
					});
					process(objects);						
				},error: function (error) {
					console.error(error);
					//alert('error; ' + eval(error));
					return false;
				}
			});
        },updater: function(item) {
			$('#country').val(map[item].country_name);
			$('#country_code').val(map[item].country_code);
			return item;				
		}
    });

	$("#city").typeahead({
		//minLength: 2,     
		source: function (query, process) {
        	var t=$("input[name='csrf_test_name']").val();			
			objects = [];
			map = {};
			
			var cc=$("#country_code").val();
			var s=$("#state_code").val();
			
			$.ajax({
				url: base_url+"home/get_cities_state/",
				data: {name: query, country:cc, state:s, csrf_test_name:t},
				dataType: "json",
				type: "POST",
				success: function (data) {
					
					$.each(data, function(i, object) {
						
						map[object.name] = object;
						objects.push(object.name);
					});
					process(objects);						
				},error: function (error) {
					console.error(error);
					//alert('error; ' + eval(error));
					return false;
				}
			});
        },updater: function(item) {
			$('#city').val(map[item].name);
			return item;				
		}
    });
		
	$("#state").typeahead({
		//minLength: 2,
		
        source: function (query, process) {
        	var t=$("input[name='csrf_test_name']").val();			
			objects = [];
			map = {};
			
			var cc=$("#country_code").val();
			$("#city").val("");
			$.ajax({
				url: base_url+"home/get_cities_state/",
				data: {name: query, country:cc, state:"1", csrf_test_name:t},
				dataType: "json",
				type: "POST",
				success: function (data) {
					
					$.each(data, function(i, object) {
						
						map[object.name] = object;
						objects.push(object.name);
					});
					process(objects);						
				},error: function (error) {
					console.error(error);
					//alert('error; ' + eval(error));
					return false;
				}
			});
        },updater: function(item) {
			var Stid="";
			var c=$("#country_code").val();

			if(c=="MX") Stid=map[item].id_state_country
			else if(c=="US") Stid=map[item].alpha2;

			$('#state').val(map[item].name);
			$('#state_code').val(Stid);
			return item;				
		}
	});

/*	// to use with a jquery.promise in a future 
function get_c_s_city(option,query){
		var t=$("input[name='csrf_test_name']").val();			
		objects = [];
		map = {};
		var dat={name:query,csrf_test_name:t};
		
		if(option=="country")
		{
			dat.country="1";
			$("#state").val("");
			$("#city").val("");
			$("#state_code").val("");
		}else if(option=="state")
		{
			dat.country=$("#country_code").val();
			dat.state="1";
			$("#city").val("");
		}else{
			dat.country=$("#country_code").val();
			dat.state=$("#state_code").val();
		}

		$.ajax({
			url: base_url+"home/get_cities_state/",
			data: dat,
			dataType: "json",
			type: "POST",
			success: function (data) {
				$.each(data, function(i, object) {
					map[object.country_name] = object;
					objects.push(object.country_name);
				}); 
				
				return {m:map,o:objects};
				//process(objects);						
			},error: function (error) {
				console.error(error);
				//alert('error; ' + eval(error));
				return false;
			}
		});
	}*/

/*  //  fill a select list
	function fill_select(idselect,data,datakey){
		var select=$('#'+idselect);
		select.html('');
		var opts='<option>'+js_lang.choose_one+'</option>';
		var count=0;
		if(data[0] !== undefined && data[0].hasOwnProperty(datakey) && data[0][datakey] !== undefined){
			$.each(data, function(key, state) {   
				opts+='<option value="'+state[datakey]+'">'+state.name+'</option>'; 
				count++;
			});
		}
		if(count==0){
			opts='<option>'+js_lang.empty +'</option>';
		}
		select.append(opts);
		
	}*/
});
	/*var estadosMX=[
	{"id": 1,"name": "Aguascalientes"},{"id": 2,"name": "Baja California"},{"id": 3,"name": "Baja California Sur"},{"id": 4,"name": "Campeche"},{"id": 5,"name": "Coahuila"},{"id": 6,"name": "Colima"},{"id": 7,"name": "Chiapas"},{"id": 8,"name": "Chihuahua"},
	{"id": 9,"name": "Distrito Federal"},{"id": 10,"name": "Durango"},{"id": 11,"name": "Guanajuato" },{"id": 12,"name": "Guerrero"},{"id": 13,"name": "Hidalgo"},{"id": 14,"name": "Jalisco"},{"id": 15,"name": "México"},{"id": 16,"name":"Michoacán"},
	{"id": 17,"name": "Morelos"},{"id": 18,"name": "Nayarit"},{"id": 19,"name": "Nuevo León"},{"id": 20,"name": "Oaxaca"},{"id": 21,"name": "Puebla"},{"id": 22,"name": "Querétaro"},{"id": 23,"name": "Quintana Roo"},{"id": 24,"name": "San Luis Potosí"},
	{"id": 25,"name": "Sinaloa"},{"id": 26,"name": "Sonora"},{"id": 27,"name": "Tabasco"},{"id": 28,"name": "Tamaulipas"},{"id": 29,"name": "Tlaxcala"},{"id": 30,"name": "Veracruz"},{"id": 31,"name": "Yucatán"},{"id": 32,"name": "Zacatecas"}];*/
	
