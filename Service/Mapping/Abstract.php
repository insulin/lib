<?php

/**
 * This class makes sure that an integration with external services has propper
 * mapping function (to and from external sources).
 */
abstract class Insulin_Service_Mapping_Abstract
{

    /**
     * Mapping when receiving external sources information.
     *
     * @param array|object $source
     *   The array or object with the data required to map to an internal
     *   source.
     * @return array
     *   The properties with mapped values of the internal source.
     */
    abstract static function toInternal($source);

    /**
     * Mapping for external service sources.
     *
     * @param array|object $source
     *   The array or object with the data required to map to an external
     *   source.
     * @param array fields
     *   (optional) The fields to convert/send to an external source. If null,
     *   send all defined on the mapping.
     * @return array
     *   The mapped values to send to the external source.
     */
    abstract static function toExternal($source, array $fields = null);

}
