<?php

namespace App\Serializers;

use Spatie\Fractalistic\ArraySerializer;

/* https://github.com/thephpleague/fractal/issues/251#issuecomment-161484566 */

class APISerializer extends ArraySerializer

{

    public function collection($resourceKey, array $data)
    {

        if ($resourceKey) {
            return [$resourceKey => $data];
        }

        return $data;

    }

    public function item($resourceKey, array $data)
    {

        if ($resourceKey) {
            return [$resourceKey => $data];
        }

        return $data;

    }

}