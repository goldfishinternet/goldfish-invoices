<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-3">
        <label class="form-label required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
        <input class="form-control {{ $errors->has('permission.title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" required wire:model.defer="permission.title">
        <div class="invalid-feedback">
            {{ $errors->first('permission.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.title_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
