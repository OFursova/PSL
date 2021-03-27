<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'address' => $this->address,
            'role' => ['id' => $this->roles->id, 'name' => $this->roles->name, 'slug' => $this->roles->slug],
            'specialization' => $this->specs,
            'cases' => $this->cases
        ];
    }
}
