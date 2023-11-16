<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-3">
        <label class="form-label required" for="client">{{ trans('cruds.clientContact.fields.client') }}</label>
        <x-select-list class="form-control {{ $errors->has('clientContact.client_id') ? 'is-invalid' : '' }}" required id="client_id" name="client_id" :options="$this->listsForFields['client']" wire:model="clientContact.client_id" />
        <div class="invalid-feedback">
            {{ $errors->first('clientContact.client_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clientContact.fields.client_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="first_name">{{ trans('cruds.clientContact.fields.first_name') }}</label>
        <input class="form-control {{ $errors->has('clientContact.first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" wire:model.defer="clientContact.first_name">
        <div class="invalid-feedback">
            {{ $errors->first('clientContact.first_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clientContact.fields.first_name_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="last_name">{{ trans('cruds.clientContact.fields.last_name') }}</label>
        <input class="form-control {{ $errors->has('clientContact.last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" wire:model.defer="clientContact.last_name">
        <div class="invalid-feedback">
            {{ $errors->first('clientContact.last_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clientContact.fields.last_name_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">{{ trans('cruds.clientContact.fields.email') }}</label>
        <input class="form-control {{ $errors->has('clientContact.email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" wire:model.defer="clientContact.email">
        <div class="invalid-feedback">
            {{ $errors->first('clientContact.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clientContact.fields.email_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="phone">{{ trans('cruds.clientContact.fields.phone') }}</label>
        <input class="form-control {{ $errors->has('clientContact.phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone_1" wire:model.defer="clientContact.phone">
        <div class="invalid-feedback">
            {{ $errors->first('clientContact.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clientContact.fields.phone_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="mobile">{{ trans('cruds.clientContact.fields.mobile') }}</label>
        <input class="form-control {{ $errors->has('clientContact.mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" wire:model.defer="clientContact.mobile">
        <div class="invalid-feedback">
            {{ $errors->first('clientContact.mobile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clientContact.fields.mobile_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.client-contacts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
