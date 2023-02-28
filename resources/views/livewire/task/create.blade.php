<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('task.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.task.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="task.name">
        <div class="validation-message">
            {{ $errors->first('task.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.task.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="task.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('task.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.status_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="status">{{ trans('cruds.task.fields.status') }}</label>
        <x-select-list class="form-control" required id="status" name="status" :options="$this->listsForFields['status']" wire:model="task.status_id" />
        <div class="validation-message">
            {{ $errors->first('task.status_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tag') ? 'invalid' : '' }}">
        <label class="form-label" for="tag">{{ trans('cruds.task.fields.tag') }}</label>
        <x-select-list class="form-control" id="tag" name="tag" wire:model="tag" :options="$this->listsForFields['tag']" multiple />
        <div class="validation-message">
            {{ $errors->first('tag') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.tag_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.task_attachment') ? 'invalid' : '' }}">
        <label class="form-label" for="attachment">{{ trans('cruds.task.fields.attachment') }}</label>
        <x-dropzone id="attachment" name="attachment" action="{{ route('admin.tasks.storeMedia') }}" collection-name="task_attachment" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.task_attachment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.attachment_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.due_date') ? 'invalid' : '' }}">
        <label class="form-label" for="due_date">{{ trans('cruds.task.fields.due_date') }}</label>
        <x-date-picker class="form-control" wire:model="task.due_date" id="due_date" name="due_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('task.due_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.due_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('task.assigned_to_id') ? 'invalid' : '' }}">
        <label class="form-label" for="assigned_to">{{ trans('cruds.task.fields.assigned_to') }}</label>
        <x-select-list class="form-control" id="assigned_to" name="assigned_to" :options="$this->listsForFields['assigned_to']" wire:model="task.assigned_to_id" />
        <div class="validation-message">
            {{ $errors->first('task.assigned_to_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.task.fields.assigned_to_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>