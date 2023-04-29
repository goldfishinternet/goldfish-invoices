<form wire:submit.prevent="submit" class="pt-3" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label" for="name">{{ trans('cruds.setting.fields.name') }}</label>
        <input class="form-control {{ $errors->has('setting.name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" wire:model.defer="setting.name">
        <div class="invalid-feedback">
            {{ $errors->first('setting.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.name_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="address_1">{{ trans('cruds.setting.fields.address_1') }}</label>
        <input class="form-control {{ $errors->has('setting.address_1') ? 'is-invalid' : '' }}" type="text" name="address_1" id="address_1" wire:model.defer="setting.address_1">
        <div class="invalid-feedback">
            {{ $errors->first('setting.address_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.address_1_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="address_2">{{ trans('cruds.setting.fields.address_2') }}</label>
        <input class="form-control {{ $errors->has('setting.address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" wire:model.defer="setting.address_2">
        <div class="invalid-feedback">
            {{ $errors->first('setting.address_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.address_2_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="city">{{ trans('cruds.setting.fields.city') }}</label>
        <input class="form-control {{ $errors->has('setting.city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" wire:model.defer="setting.city">
        <div class="invalid-feedback">
            {{ $errors->first('setting.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.city_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="region">{{ trans('cruds.setting.fields.region') }}</label>
        <input class="form-control {{ $errors->has('setting.region') ? 'is-invalid' : '' }}" type="text" name="region" id="region" wire:model.defer="setting.region">
        <div class="invalid-feedback">
            {{ $errors->first('setting.region') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.region_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="postcode">{{ trans('cruds.setting.fields.postcode') }}</label>
        <input class="form-control {{ $errors->has('setting.postcode') ? 'is-invalid' : '' }}" type="text" name="postcode" id="postcode" wire:model.defer="setting.postcode">
        <div class="invalid-feedback">
            {{ $errors->first('setting.postcode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.postcode_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="country">{{ trans('cruds.setting.fields.country') }}</label>
        <input class="form-control {{ $errors->has('setting.country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" wire:model.defer="setting.country">
        <div class="invalid-feedback">
            {{ $errors->first('setting.country') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.country_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="website">{{ trans('cruds.setting.fields.website') }}</label>
        <input class="form-control {{ $errors->has('setting.website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" wire:model.defer="setting.website">
        <div class="invalid-feedback">
            {{ $errors->first('setting.website') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.website_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
        <input class="form-control {{ $errors->has('setting.phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" wire:model.defer="setting.phone">
        <div class="invalid-feedback">
            {{ $errors->first('setting.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.phone_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="mobile">{{ trans('cruds.setting.fields.mobile') }}</label>
        <input class="form-control {{ $errors->has('setting.mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" wire:model.defer="setting.mobile">
        <div class="invalid-feedback">
            {{ $errors->first('setting.mobile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.mobile_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="primary_contact">{{ trans('cruds.setting.fields.primary_contact') }}</label>
        <input class="form-control {{ $errors->has('setting.primary_contact') ? 'is-invalid' : '' }}" type="text" name="primary_contact" id="primary_contact" wire:model.defer="setting.primary_contact">
        <div class="invalid-feedback">
            {{ $errors->first('setting.primary_contact') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.primary_contact_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="primary_contact_email">{{ trans('cruds.setting.fields.primary_contact_email') }}</label>
        <input class="form-control {{ $errors->has('setting.primary_contact_email') ? 'is-invalid' : '' }}" type="text" name="primary_contact_email" id="primary_contact_email" wire:model.defer="setting.primary_contact_email">
        <div class="invalid-feedback">
            {{ $errors->first('setting.primary_contact_email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.primary_contact_email_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
        <div class="row mb-3">
            <div class="col-6">
                @if ($setting->logo)
                <div class="bg-light p-3">
                    <img src="{{ asset('storage/'.$setting->logo) }}" width="320">
                </div>
                    <button class="btn btn-sm" wire:click="removeLogo"><i class="fas fa-trash-alt"></i></button>
                @endif
            </div>
            <div class="col-6">
                @if ($logo && !$errors->has('logo'))
                <div class="bg-light p-3">
                    Photo Preview:
                    <img src="{{ $logo->temporaryUrl() }}" width="320">
                </div>
                @endif
            </div>
        </div>
        <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="file" name="logo" id="logo" wire:model="logo" >
        <div class="invalid-feedback">
            {{ $errors->first('logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.logo_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="currency_type">{{ trans('cruds.setting.fields.currency_type') }}</label>
        <input class="form-control {{ $errors->has('setting.currency_type') ? 'is-invalid' : '' }}" type="text" name="currency_type" id="currency_type" wire:model.defer="setting.currency_type">
        <div class="invalid-feedback">
            {{ $errors->first('setting.currency_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.currency_type_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="currency_symbol">{{ trans('cruds.setting.fields.currency_symbol') }}</label>
        <input class="form-control {{ $errors->has('setting.currency_symbol') ? 'is-invalid' : '' }}" type="text" name="currency_symbol" id="currency_symbol" wire:model.defer="setting.currency_symbol">
        <div class="invalid-feedback">
            {{ $errors->first('setting.currency_symbol') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.currency_symbol_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="tax_code">{{ trans('cruds.setting.fields.tax_code') }}</label>
        <input class="form-control {{ $errors->has('setting.tax_code') ? 'is-invalid' : '' }}" type="text" name="tax_code" id="tax_code" wire:model.defer="setting.tax_code">
        <div class="invalid-feedback">
            {{ $errors->first('setting.tax_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.tax_code_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="default_tax_1_desc">{{ trans('cruds.setting.fields.default_tax_1_desc') }}</label>
        <input class="form-control {{ $errors->has('setting.default_tax_1_desc') ? 'is-invalid' : '' }}" type="text" name="default_tax_1_desc" id="default_tax_1_desc" wire:model.defer="setting.default_tax_1_desc">
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_tax_1_desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_tax_1_desc_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_tax_1_rate">{{ trans('cruds.setting.fields.default_tax_1_rate') }}</label>
        <input class="form-control {{ $errors->has('setting.default_tax_1_rate') ? 'is-invalid' : '' }}" type="text" name="default_tax_1_rate" id="default_tax_1_rate" wire:model.defer="setting.default_tax_1_rate">
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_tax_1_rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_tax_1_rate_helper') }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="default_tax_2_desc">{{ trans('cruds.setting.fields.default_tax_2_desc') }}</label>
        <input class="form-control {{ $errors->has('setting.default_tax_2_desc') ? 'is-invalid' : '' }}" type="text" name="default_tax_2_desc" id="default_tax_2_desc" wire:model.defer="setting.default_tax_2_desc">
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_tax_2_desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_tax_2_desc_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_tax_2_rate">{{ trans('cruds.setting.fields.default_tax_2_rate') }}</label>
        <input class="form-control {{ $errors->has('setting.default_tax_2_rate') ? 'is-invalid' : '' }}" type="text" name="default_tax_2_rate" id="default_tax_2_rate" wire:model.defer="setting.default_tax_2_rate">
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_tax_2_rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_tax_2_rate_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_days_payment_due">{{ trans('cruds.setting.fields.default_days_payment_due') }}</label>
        <input class="form-control {{ $errors->has('setting.default_days_payment_due') ? 'is-invalid' : '' }}" type="text" name="default_days_payment_due" id="default_days_payment_due" wire:model.defer="setting.default_days_payment_due">
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_days_payment_due') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_days_payment_due_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_invoice_notes">{{ trans('cruds.setting.fields.default_invoice_notes') }}</label>
        <textarea class="form-control {{ $errors->has('setting.default_invoice_notes') ? 'is-invalid' : '' }}" type="text" name="default_invoice_notes" id="default_invoice_notes" wire:model.defer="setting.default_invoice_notes"></textarea>
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_invoice_notes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_invoice_notes_helper') }}
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="default_payment_instructions">{{ trans('cruds.setting.fields.default_payment_instructions') }}</label>
        <textarea class="form-control {{ $errors->has('setting.default_payment_instructions') ? 'is-invalid' : '' }}" type="text" name="default_payment_instructions" id="default_payment_instructions" wire:model.defer="setting.default_payment_instructions"></textarea>
        <div class="invalid-feedback">
            {{ $errors->first('setting.default_payment_instructions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.default_payment_instructions_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary mx-1" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>
