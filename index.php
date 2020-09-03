function initMap() {
    	var options = {
		  componentRestrictions: {country: "us"}
		 };
    	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('pac-input'),options);
    	var country_key = zip_key = locality_key = administrative_area_level_1_key = -1;
        autocomplete.addListener('place_changed', function() {
    	 	country_key = zip_key = locality_key = administrative_area_level_1_key = -1;
        	jQuery('.filters').val('');
          	var place = autocomplete.getPlace();
          	for(var j =0 ;j<place.address_components.length;j++)
          	{

          		if(place.address_components[j].types[0]=='country')
          		{
          			country_key = j;
          		}
          		if(place.address_components[j].types[0]=='postal_code')
          		{
          			zip_key = j;
          		}
          		if(place.address_components[j].types[0]=='administrative_area_level_1')
          		{
          			administrative_area_level_1_key = j;
          		}
          		if(place.address_components[j].types[0]=='administrative_area_level_2')
          		{
          			administrative_area_level_2_key = j;
          		}
          		if(place.address_components[j].types[0]=='locality')
          		{
          			locality_key = j;
          		}
          	}
          	if(country_key!=-1)
          	{
          		jQuery('#search_country').val(place.address_components[country_key].long_name);
          	}
          	if(zip_key!=-1)
          	{
          		jQuery('#search_postalcode').val(place.address_components[zip_key].long_name);
          	}
          	if(locality_key!=-1)
          	{
          		jQuery('#search_city').val(place.address_components[locality_key].long_name);
          	}
          	if(administrative_area_level_1_key!=-1)
          	{
          		jQuery('#search_state').val(place.address_components[administrative_area_level_1_key].short_name);
          	}
          	//console.log(place)
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        
      }

      function validateForm() {
		  var search_key = document.forms["job_search"]["search_key"].value;
		  var search_loc = document.forms["job_search"]["search_loc"].value;
		  if ((search_key != "") || (search_loc != "")) {
		    return true;
		  } else {		  	
		  	alert("Please Enter keyword or location!");
		  	return false;
		  }
	 }
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB95qqlPqe4WwKpzC3g2lwZEgPe0mtyMC4&libraries=places&callback=initMap"
        async defer></script>
