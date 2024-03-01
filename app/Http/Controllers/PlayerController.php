<?php

// /////////////////////////////////////////////////////////////////////////////
// PLEASE DO NOT RENAME OR REMOVE ANY OF THE CODE BELOW. 
// YOU CAN ADD YOUR CODE TO THIS FILE TO EXTEND THE FEATURES TO USE THEM IN YOUR WORK.
// /////////////////////////////////////////////////////////////////////////////

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Resources\PlayerResources;
use App\Repositories\PlayerRepository;

class PlayerController extends Controller
{
    protected $repo;

    public function __construct(PlayerRepository $repositories)
    {
        $this->repo = $repositories;
    }

    public function index()
    {
        $data = $this->repo->all();

        return response()->json($data);
    }

    public function show($id)
    {
        $data = $this->repo->show($id);

        return response()->json($data);
    }

    public function store(StorePlayerRequest $request)
    {
        $data = $request->all();

        $res = $this->repo->create($data);

        return response()->json($res);
    }

    public function update()
    {
        return response("Failed", 500);
    }

    public function destroy()
    {
        return response("Failed", 500);
    }
}
