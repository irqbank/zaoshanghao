var map, geocoder;

function init ()
{
	map = new google.maps.Map(document.getElementById('map'),
	{
		mapTypeId: google.maps.MapTypeId.TERRAIN,
		disableDefaultUI: true
	});

	geocoder = new google.maps.Geocoder();
}

// to do: remove old circle when updating
function draw (latlng, range)
{
	var circle = new google.maps.Circle({
		strokeColor: '#FF0000',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillOpacity: 0,
		map: map,
		center: latlng,
		radius: range * 1000
	});

	var bounds = circle.getBounds();
	map.fitBounds(bounds);
	map.setCenter(latlng);

	var marker = new google.maps.Marker({
		position: latlng,
		map: map
	});

	return circle;
}

function find ()
{
	var location = document.getElementById("location").value;
	var range = document.getElementById("range").value;
	if ("" == location || "" == range)
		return;

	geocoder.geocode({'address': location}, function(results, status) 
	{
		if (google.maps.GeocoderStatus.OK == status)
		{
			document.getElementById("lat").value = results[0].geometry.location.lat();
			document.getElementById("lng").value = results[0].geometry.location.lng();
			draw(results[0].geometry.location, range);
		}
		else
		{
			alert("Could not find location: " + location + ", reason: " + status);
		}
	});
}

function checkLatLng ()
{
	if ("" != document.getElementById("lat").value && "" != document.getElementById("lng").value)
	{
		return true;
	}
	else
	{
		alert("Please set your location first using the Set button");
		return false;
	}
}
