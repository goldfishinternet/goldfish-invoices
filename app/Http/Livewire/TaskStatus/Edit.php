<?php

namespace App\Http\Livewire\TaskStatus;

use App\Models\TaskStatus;
use Livewire\Component;

class Edit extends Component
{
    public TaskStatus $taskStatus;

    public function mount(TaskStatus $taskStatus)
    {
        $this->taskStatus = $taskStatus;
    }

    public function render()
    {
        return view('livewire.task-status.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->taskStatus->save();

        return redirect()->route('admin.task-statuses.index');
    }

    protected function rules(): array
    {
        return [
            'taskStatus.name' => [
                'string',
                'required',
            ],
        ];
    }
}
