<?php

namespace App\Repositories;

use App\Http\Resources\Collections\Collections;
use App\Http\Resources\Collections\PlayerCollection;
use App\Http\Resources\PlayerResources;
use App\Http\Resources\Resources;
use App\Models\Player;
use App\Models\PlayerSkill;

class PlayerRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Player();
        $this->resources = PlayerResources::class;
        $this->collection = PlayerCollection::class;
    }

    public function all()
    {
        $data = $this->model::all();
        $res = $this->collections($data);

        return $res;
    }

    public function single($data)
    {
        return new $this->resources($data);
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return $this->single($data);
    }

    public function create($request)
    {
        $res = $this->model::create($request);


        if ($res->wasRecentlyCreated) {

            foreach ($request['playerSkills'] as $skill) {
                $res->skills()->create(
                    [
                        'skill' => $skill['skill'],
                        'value' => $skill['value']
                    ]
                );
            }
        }


        return new PlayerResources($res);
    }
}
