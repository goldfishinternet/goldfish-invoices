<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-3">
        <label class="form-label required" for="title">{{ trans('cruds.role.fields.title') }}</label>
        <input class="form-control {{ $errors->has('role.title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" required wire:model.defer="role.title">
        <div class="invalid-feedback">
            {{ $errors->first('role.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.role.fields.title_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
        <x-select-list class="form-control {{ $errors->has('permissions') ? 'is-invalid' : '' }}" required id="permissions" name="permissions" wire:model="permissions" :options="$this->listsForFields['permissions']" multiple />
        <div class="invalid-feedback">
            {{ $errors->first('permissions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.role.fields.permissions_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
