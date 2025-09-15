<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date ? date('d F Y', strtotime($this->due_date)) : null,
            'project' => [
                'id' => $this->project->id,
                'name_project' => $this->project->name_project
            ],
            'tags' => $this->whenLoaded('tags', function () {
                return $this->tag->pluck('name_tag');
            }),
            'sub_tasks' => TaskResource::collection($this->whenLoaded('children')),
            'created_at' => $this->created_at->format('d-m-Y H:i:s'),
        ];
    }
}
