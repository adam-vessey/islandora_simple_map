<?php
/**
 * @file
 * Document module hooks.
 */

/**
 * Gather GeoJSON info for an object.
 *
 *
 * @see https://tools.ietf.org/html/rfc7946
 *
 * @param AbstractObject $object
 *   The object for which to gather GeoJSON info.
 *
 * @return array
 *   Should return an array of arrays, each representing a GeoJSON feature.
 */
function hook_islandora_simple_map_gather_geojson(AbstractObject $object) {
  return array(
    array(
      'type' => 'Feature',
      'geometry' => array(
        'type' => 'Point',
        // Fun fact: GeoJSON is long,lat (not lat,long).
        'coordinates' => array(0, 0),
      ),
    ),
  );
}

/**
 * Permit altering of the GeoJSON info.
 *
 * @param array $info
 *   The GeoJSON features, as build from
 *   hook_islandora_simple_map_gather_geojson().
 * @param AbstractObject $object
 *   The object for which the GeoJSON is being gathered.
 */
function hook_islandora_simple_map_gather_geojson_alter(&$info, AbstractObject $object) {
}
