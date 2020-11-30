<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class PostResource extends JsonResource
    {
        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array
         */
        public function toArray($request): array
        {
            return [
                'id'                => $this->id,
                'title'             => $this->title,
                'slug'              => $this->slug,
                'description'       => $this->description,
                'body'              => $this->body,
                'created_at'        => $this->created_at,
                'updated_at'        => $this->updated_at,
                'published_at'      => $this->published_at ? $this->published_at->format('m/d/Y H:i:s') : '',
                'pub_friendly_date' => $this->published_at ? $this->published_at->diffForHumans() : '',
                'is_published'      => (bool) $this->is_published,
            ];
        }
    }
