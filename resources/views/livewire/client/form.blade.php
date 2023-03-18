<form wire:submit.prevent="submit" class="pt-3">

    <div class="mb-3 {{ $errors->has('client.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.client.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="client.name">
        <div class="validation-message">
            {{ $errors->first('client.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.name_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.address_1') ? 'invalid' : '' }}">
        <label class="form-label" for="address_1">{{ trans('cruds.client.fields.address_1') }}</label>
        <input class="form-control" type="text" name="address_1" id="address_1" wire:model.defer="client.address_1">
        <div class="validation-message">
            {{ $errors->first('client.address_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.address_1_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.address_2') ? 'invalid' : '' }}">
        <label class="form-label" for="address_2">{{ trans('cruds.client.fields.address_2') }}</label>
        <input class="form-control" type="text" name="address_2" id="address_2" wire:model.defer="client.address_2">
        <div class="validation-message">
            {{ $errors->first('client.address_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.address_2_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.city') ? 'invalid' : '' }}">
        <label class="form-label" for="city">{{ trans('cruds.client.fields.city') }}</label>
        <input class="form-control" type="text" name="city" id="city" wire:model.defer="client.city">
        <div class="validation-message">
            {{ $errors->first('client.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.city_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.region') ? 'invalid' : '' }}">
        <label class="form-label" for="region">{{ trans('cruds.client.fields.region') }}</label>
        <input class="form-control" type="text" name="region" id="region" wire:model.defer="client.region">
        <div class="validation-message">
            {{ $errors->first('client.region') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.region_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.postcode') ? 'invalid' : '' }}">
        <label class="form-label" for="postcode">{{ trans('cruds.client.fields.postcode') }}</label>
        <input class="form-control" type="text" name="postcode" id="postcode" wire:model.defer="client.postcode">
        <div class="validation-message">
            {{ $errors->first('client.postcode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.postcode_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.country') ? 'invalid' : '' }}">
        <label class="form-label" for="country">{{ trans('cruds.client.fields.country') }}</label>
        <input class="form-control" type="text" name="country" id="country" wire:model.defer="client.country">
        <div class="validation-message">
            {{ $errors->first('client.country') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.country_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.website') ? 'invalid' : '' }}">
        <label class="form-label" for="website">{{ trans('cruds.client.fields.website') }}</label>
        <input class="form-control" type="text" name="website" id="website" wire:model.defer="client.website">
        <div class="validation-message">
            {{ $errors->first('client.website') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.website_helper') }}
        </div>
    </div>
    <div class="mb-3 {{ $errors->has('client.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.client.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" wire:model.defer="client.email">
        <div class="validation-message">
            {{ $errors->first('client.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.email_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
