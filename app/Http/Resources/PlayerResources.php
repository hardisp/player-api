<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];

        if ($request->isMethod('post')) {
            $data['id'] = $this->id;
        }


        $data = array_merge($data,  [
            'name' => $this->name,
            'position' => $this->position,
            'playerSkils' =>  SkillResources::collection($this->skills),
        ]);

        return $data;
    }
}
