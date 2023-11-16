<form wire:submit.prevent="submit" class="pt-3" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label" for="name">{{ trans('cruds.client.fields.name') }}</label>
        <input class="form-control {{ $errors->has('client.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" wire:model.defer="client.name">
        <div class="invalid-feedback">
            {{ $errors->first('client.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.name_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="address_1">{{ trans('cruds.client.fields.address_1') }}</label>
        <input class="form-control {{ $errors->has('client.address_1') ? 'is-invalid' : '' }}" type="text" name="address_1" id="address_1" wire:model.defer="client.address_1">
        <div class="invalid-feedback">
            {{ $errors->first('client.address_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.address_1_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="address_2">{{ trans('cruds.client.fields.address_2') }}</label>
        <input class="form-control {{ $errors->has('client.address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" wire:model.defer="client.address_2">
        <div class="invalid-feedback">
            {{ $errors->first('client.address_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.address_2_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="city">{{ trans('cruds.client.fields.city') }}</label>
        <input class="form-control {{ $errors->has('client.city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" wire:model.defer="client.city">
        <div class="invalid-feedback">
            {{ $errors->first('client.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.city_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="region">{{ trans('cruds.client.fields.region') }}</label>
        <input class="form-control {{ $errors->has('client.region') ? 'is-invalid' : '' }}" type="text" name="region" id="region" wire:model.defer="client.region">
        <div class="invalid-feedback">
            {{ $errors->first('client.region') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.region_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="postcode">{{ trans('cruds.client.fields.postcode') }}</label>
        <input class="form-control {{ $errors->has('client.postcode') ? 'is-invalid' : '' }}" type="text" name="postcode" id="postcode" wire:model.defer="client.postcode">
        <div class="invalid-feedback">
            {{ $errors->first('client.postcode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.postcode_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="country">{{ trans('cruds.client.fields.country') }}</label>
        <input class="form-control {{ $errors->has('client.country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" wire:model.defer="client.country">
        <div class="invalid-feedback">
            {{ $errors->first('client.country') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.country_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="website">{{ trans('cruds.client.fields.website') }}</label>
        <input class="form-control {{ $errors->has('client.website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" wire:model.defer="client.website">
        <div class="invalid-feedback">
            {{ $errors->first('client.website') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.website_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">{{ trans('cruds.client.fields.email') }}</label>
        <input class="form-control {{ $errors->has('client.email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" wire:model.defer="client.email">
        <div class="invalid-feedback">
            {{ $errors->first('client.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.email_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">{{ trans('cruds.client.fields.tax_code') }}</label>
        <input class="form-control {{ $errors->has('client.tax_code') ? 'is-invalid' : '' }}" type="text" name="tax_code" id="tax_code" wire:model.defer="client.tax_code">
        <div class="invalid-feedback">
            {{ $errors->first('client.tax_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.tax_code_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input id="tax_status" type="checkbox" wire:model.defer="client.tax_status" class="form-check-input">
            <label for="tax_status" class="form-check-label">Taxable?</label>
        </div>
        <div class="invalid-feedback">
            {{ $errors->first('client.tax_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.tax_status_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="default_tax_1_desc">{{ trans('cruds.client.fields.default_tax_1_desc') }}</label>
        <input class="form-control {{ $errors->has('client.default_tax_1_desc') ? 'is-invalid' : '' }}" type="text" name="default_tax_1_desc" id="default_tax_1_desc" wire:model.defer="client.default_tax_1_desc">
        <div class="invalid-feedback">
            {{ $errors->first('client.default_tax_1_desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_tax_1_desc_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_tax_1_rate">{{ trans('cruds.client.fields.default_tax_1_rate') }}</label>
        <input class="form-control {{ $errors->has('client.default_tax_1_rate') ? 'is-invalid' : '' }}" type="text" name="default_tax_1_rate" id="default_tax_1_rate" wire:model.defer="client.default_tax_1_rate">
        <div class="invalid-feedback">
            {{ $errors->first('client.default_tax_1_rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_tax_1_rate_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_tax_2_desc">{{ trans('cruds.client.fields.default_tax_2_desc') }}</label>
        <input class="form-control {{ $errors->has('client.default_tax_2_desc') ? 'is-invalid' : '' }}" type="text" name="default_tax_2_desc" id="default_tax_2_desc" wire:model.defer="client.default_tax_2_desc">
        <div class="invalid-feedback">
            {{ $errors->first('client.default_tax_2_desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_tax_2_desc_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_tax_2_rate">{{ trans('cruds.client.fields.default_tax_2_rate') }}</label>
        <input class="form-control {{ $errors->has('client.default_tax_2_rate') ? 'is-invalid' : '' }}" type="text" name="default_tax_2_rate" id="default_tax_2_rate" wire:model.defer="client.default_tax_2_rate">
        <div class="invalid-feedback">
            {{ $errors->first('client.default_tax_2_rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_tax_2_rate_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_days_payment_due">{{ trans('cruds.client.fields.default_days_payment_due') }}</label>
        <input class="form-control {{ $errors->has('client.default_days_payment_due') ? 'is-invalid' : '' }}" type="text" name="default_days_payment_due" id="default_days_payment_due" wire:model.defer="client.default_days_payment_due">
        <div class="invalid-feedback">
            {{ $errors->first('client.default_days_payment_due') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_days_payment_due_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_invoice_notes">{{ trans('cruds.client.fields.default_invoice_notes') }}</label>
        <textarea class="form-control {{ $errors->has('client.default_invoice_notes') ? 'is-invalid' : '' }}" type="text" name="default_invoice_notes" id="default_invoice_notes" wire:model.defer="client.default_invoice_notes"></textarea>
        <div class="invalid-feedback">
            {{ $errors->first('client.default_invoice_notes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_invoice_notes_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_payment_instructions">{{ trans('cruds.client.fields.default_payment_instructions') }}</label>
        <textarea class="form-control {{ $errors->has('client.default_payment_instructions') ? 'is-invalid' : '' }}" type="text" name="default_payment_instructions" id="default_payment_instructions" wire:model.defer="client.default_payment_instructions"></textarea>
        <div class="invalid-feedback">
            {{ $errors->first('client.default_payment_instructions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.default_payment_instructions_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
