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
	        dataToAdd["properties"]["location"] = value.location;

	        jsonData["features"].push(dataToAdd);

	    }

	});

};




$.getJSON('http://localhost/wp-json/wp/v2/rahp_object', dataSuccess);
