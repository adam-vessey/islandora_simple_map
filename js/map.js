(function ($) {
  Drupal.islandora_simple_map = {
    maps: {},
    init: function () {
      $.each(Drupal.settings.islandora_simple_map.data, Drupal.islandora_simple_map.initMap);
    },
    initMap: function (id, info) {
      var map = new google.maps.Map(document.getElementById(id), {
        center: {lat: 0, lng: 0},
        zoom: info.zoom
      });
      Drupal.islandora_simple_map.maps[id] = map;

      map.data.addGeoJson(info.geojson);
      Drupal.islandora_simple_map.recenterMap(map);
    },
    recenterMap: function (map, zoom) {
      var bounds = new google.maps.LatLngBounds();

      map.data.forEach(function (feature) {
        feature.getGeometry().forEachLatLng(function (latlng) {
          bounds.extend(latlng);
        });
      });

      map.fitBounds(bounds);
    }
  };
})(jQuery);
