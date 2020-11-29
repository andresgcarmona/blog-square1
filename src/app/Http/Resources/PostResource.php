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
                'id'           => $this->id,
                'title'        => $this->title,
                'description'  => $this->description,
                'body'         => $this->body,
                'created_at'   => $this->created_at->format('m/d/Y H:i:s'),
                'updated_at'   => $this->updated_at->format('m/d/Y H:i:s'),
                'published_at' => $this->published_at ? $this->published_at->format('m/d/Y H:i:s') : '',
                'is_published' => (bool) $this->is_published,
            ];
        }
    }
