<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * Transform the resource into an array.
         *
         * @return array<string, mixed>
         */

         return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            "photo" => $this->photo,
            "auteur" => $this->auteur,
            "content" => $this->content,
            'nbr_comment' => $this->comments->count(), 
            'comments' => CommentResource::collection($this->comments), 
            'category' => CategoryResource::collection($this->categories),
            'date_creation' => $this->created_at,
            'last_modif' => $this->updated_at,
        ];
        
    }
}
