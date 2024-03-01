<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\PlayerResources;
use App\Http\Resources\SkillResources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlayerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $reformat = [];
        foreach ($this->collection as $player) {
            array_push($reformat, [
                new PlayerResources($player),
            ]);
        }

        return $reformat;
    }
}
