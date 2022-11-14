<?php
include_once 'header_map.php';
include 'postmapinfo.php';
//get_unconfirmed_locations();exit;
?>


    <div class="add-location-popup">
      <div class="add-location-container">
        <button class="map-btn" type="button">&times;</button>
        <div id="geocoder"></div>
        <div id="postmap"></div>
      </div>
    </div>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>

    <script>

        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = JSON.parse("[" + saved_markers + "]");
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'postmap',
            style: 'mapbox://styles/mapbox/satellite-streets-v11',
            center: user_location,
            zoom: 15
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
            map.on('load', function() {
            add_markers(saved_markers,'load');

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            marker.setIcon(L.mapbox.marker.icon({
            'marker-size':'#ddd',
            }));

            });
      
      
        
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                 
                    .setLngLat(marker)
                    .addTo(map);
            });

        }  

    </script>
          </div>
    