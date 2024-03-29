<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-3">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="invalid-feedback">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control {{ $errors->has('user.email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="invalid-feedback">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control {{ $errors->has('user.password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" wire:model.defer="password">
        <div class="invalid-feedback">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }}" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="invalid-feedback">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control {{ $errors->has('user.locale') ? 'is-invalid' : '' }}" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="invalid-feedback">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="team">{{ trans('cruds.user.fields.team') }}</label>
        <x-select-list class="form-control {{ $errors->has('user.team_id') ? 'is-invalid' : '' }}" id="team" name="team" :options="$this->listsForFields['team']" wire:model="user.team_id" />
        <div class="invalid-feedback">
            {{ $errors->first('user.team_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.team_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <input class="form-control {{ $errors->has('user.is_approved') ? 'is-invalid' : '' }}" type="checkbox" name="is_approved" id="is_approved" wire:model.defer="user.is_approved">
        <label class="form-label inline ml-1" for="is_approved">{{ trans('cruds.user.fields.is_approved') }}</label>
        <div class="invalid-feedback">
            {{ $errors->first('user.is_approved') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.is_approved_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
