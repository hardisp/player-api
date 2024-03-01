<?php

namespace App\Http\Resources;

use App\Models\PlayerSkill;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResources extends JsonResource
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

        $data = array_merge($data, [
            'skill' => $this->skill,
            'value' => $this->value,
        ]);

        return $data;
    }
}
