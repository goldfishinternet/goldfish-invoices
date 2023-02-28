<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\TaskTag;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Task $task;

    public array $tag = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->tag  = $this->task->tag()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'task_attachment' => $task->attachment,
        ];
    }

    public function render()
    {
        return view('livewire.task.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->task->save();
        $this->task->tag()->sync($this->tag);
        $this->syncMedia();

        return redirect()->route('admin.tasks.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->task->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'task.name' => [
                'string',
                'required',
            ],
            'task.description' => [
                'string',
                'nullable',
            ],
            'task.status_id' => [
                'integer',
                'exists:task_statuses,id',
                'required',
            ],
            'tag' => [
                'array',
            ],
            'tag.*.id' => [
                'integer',
                'exists:task_tags,id',
            ],
            'mediaCollections.task_attachment' => [
                'array',
                'nullable',
            ],
            'mediaCollections.task_attachment.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'task.due_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'task.assigned_to_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status']      = TaskStatus::pluck('name', 'id')->toArray();
        $this->listsForFields['tag']         = TaskTag::pluck('name', 'id')->toArray();
        $this->listsForFields['assigned_to'] = User::pluck('name', 'id')->toArray();
    }
}
