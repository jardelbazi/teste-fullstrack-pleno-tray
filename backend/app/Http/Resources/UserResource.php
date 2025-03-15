<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = $this->resource;
        $data = $user->toArray();

        unset($data['password']);

        return $data;
    }
}
