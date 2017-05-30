var map = L.map('map', {zoomControl:true }).setView([38.014040, -93.938758], 4.35);

L.tileLayer('https://api.mapbox.com/styles/v1/interactivemech/cj30j5gyu00022smsa3qsecld/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaW50ZXJhY3RpdmVtZWNoIiwiYSI6InJlcUtqSk0ifQ.RUwHuEkBbXoJ6SgOnXmYFg', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// ADD DATA TO MAP

var jsonData = { "type": "FeatureCollection", "features": [] };

var dataSuccess = function(data) {
	console.log(data);
	$.each(data, function(index, value){
		if (value.latitude && value.longitude){
			var dataToAdd = {};
			dataToAdd["type"] = "Feature";
	        dataToAdd["geometry"] = {};
	        dataToAdd["geometry"]["type"] = "Point";
	        dataToAdd["geometry"]["coordinates"] = [value.longitude, value.latitude];
	        dataToAdd["properties"] = {};
	        dataToAdd["properties"]["ID"] = value.ID;
	        dataToAdd["properties"]["title"] = value.post_title;
	        dataToAdd["properties"]["slug"] = value.post_name;
	        dataToAdd["properties"]["location"] = value.location;
	        dataToAdd["properties"]["date"] = value.object_date;
	       

	        jsonData["features"].push(dataToAdd);

	    }
    	
    }); // end each

     var layerOptions = {
        pointToLayer: function(featureData, latlng) {

        	var objectID = (featureData.properties.ID)
        	var objectTitle = (featureData.properties.title);
        	var objectSlug = (featureData.properties.slug);
        	var objectLocation = (featureData.properties.location);
        	var objectDate = (featureData.properties.date);

            
			


			var myIcon = L.icon({
			    iconUrl: 'http://localhost/wp-content/themes/ashbrook/img/icon-map-marker.svg',
			    iconSize:      [26, 30],
			    iconAnchor:   [12, 30],
			    shadowUrl: 'http://localhost/wp-content/themes/ashbrook/img/icon-map-marker-shadow.svg',
			    shadowSize: [23, 52],
    			shadowAnchor: [-1, 32]
			});

			var markerOptions = {
				icon: myIcon,
				riseOnHover: true
			}

			var popupOptions = {
				maxWidth: 220
			};

			var popupContent = "<div class='map-popup' id='object-" + objectID + "'><a class='map-link' href='http://localhost/rahp_objects/" + objectSlug + "/' target='_blank'>" + objectTitle + "</a><div><small>" + objectLocation + "</small></div><div><small>" + objectDate + "</small></div></div>"  ;


			return L.marker(latlng, markerOptions).bindPopup(popupContent, popupOptions);
			console.log(objectTitle);

		}
	};

	var inventoryLayer = L.geoJson(jsonData, layerOptions);
	map.addLayer(inventoryLayer);



};

console.log(jsonData);


$.getJSON('http://dev.interactivemechanics.com/ashbrook/wp-json/rest-routes/v2/locations', dataSuccess);
