<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $auth = $this->resource;

        $data = $auth->toArray();
        $data['user'] = new UserResource($auth->user);

        unset($data['email']);
        unset($data['password']);

        return $data;
    }
}
