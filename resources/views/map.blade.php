<!DOCTYPE html>
<html>
<head>
    <title>Custom Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng({{$lat}}, {{$lng}}),
            zoom: 16,
        });




        //Get My Location
        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");
        locationButton.textContent = "Get My Current Location";
        locationButton.classList.add("custom-map-control-button");

        const Restaurant = document.createElement("button");
        Restaurant.classList.add("custom-map-control-button");
        Restaurant.textContent = "Get Next";


        map.controls[google.maps.ControlPosition.TOP_CENTER].push(Restaurant);
        Restaurant.addEventListener("click", () => {
            const pos1 = {
                lat: 0,
                lng: 0,
            };

            infoWindow.setPosition(pos1);
            infoWindow.setContent("Location found.");
            infoWindow.open(map);
            map.setCenter(pos1);
        });

        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Location found.");
                        infoWindow.open(map);
                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        //End of Get my location







        const iconBase =
            "https://developers.google.com/maps/documentation/javascript/examples/full/images/";
        const icons = {
            hotel: {
                icon: "{{asset('assets/admin/images/maps/download.png')}}",
            },
            restaurant: {
                icon: "{{asset('assets/admin/images/maps/download.png')}}",
            },
            resort: {
                icon: "{{asset('assets/admin/images/maps/download.png')}}",
            },
        };
        const features = [
            @foreach($hotels as $hotel)
            {
                position: new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}}),
                type: "hotel",
            },
            @endforeach

            @foreach($restaurants as $hotel)
            {
                position: new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}}),
                type: "restaurant",
            },
            @endforeach

            @foreach($resorts as $hotel)
            {
                position: new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}}),
                type: "resort",
            },
            @endforeach
        ];

        // Create markers.
        for (let i = 0; i < features.length; i++) {
            const marker = new google.maps.Marker({
                position: features[i].position,
                icon: icons[features[i].type].icon,
                map: map,
                animation: google.maps.Animation.DROP,
            });
            const contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">Resturant Name</h1>' +
                '<div id="bodyContent">' +
                "<p><b>Resturant Name</b>, also referred to as <b>Ayers Rock</b>, is a large " +
                "sandstone rock formation in the southern part of the " +
                "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
                "south west of the nearest large town, Alice Springs; 450&#160;km " +
                "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
                "features of the Uluru - Kata Tjuta National Park. Uluru is " +
                "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
                "Aboriginal people of the area. It has many springs, waterholes, " +
                "rock caves and ancient paintings. Uluru is listed as a World " +
                "Heritage Site.</p>" +
                '<p>Visit Resturant , <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
                "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
                "</p>" +
                "</div>" +
                "</div>";
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            marker.addListener("click", () => {
                infowindow.open({
                    anchor: marker,
                    map,
                    shouldFocus: false,
                });
            });
        }
    }



</script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIDWVimEjJLhDEH11PFZmpZQqkgEXl5ao&callback=initMap&v=weekly"
    async
></script>

</body>


</html>
