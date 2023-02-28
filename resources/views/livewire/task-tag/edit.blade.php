<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('taskTag.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.taskTag.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="taskTag.name">
        <div class="validation-message">
            {{ $errors->first('taskTag.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.taskTag.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.task-tags.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>