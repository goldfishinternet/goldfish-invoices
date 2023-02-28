<?php

namespace App\Http\Livewire\TaskTag;

use App\Models\TaskTag;
use Livewire\Component;

class Create extends Component
{
    public TaskTag $taskTag;

    public function mount(TaskTag $taskTag)
    {
        $this->taskTag = $taskTag;
    }

    public function render()
    {
        return view('livewire.task-tag.create');
    }

    public function submit()
    {
        $this->validate();

        $this->taskTag->save();

        return redirect()->route('admin.task-tags.index');
    }

    protected function rules(): array
    {
        return [
            'taskTag.name' => [
                'string',
                'required',
            ],
        ];
    }
}
