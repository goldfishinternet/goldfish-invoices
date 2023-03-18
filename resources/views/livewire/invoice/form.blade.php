<div class="invoice-form">
    <div class="row mb-3">
        <div class="col-12 col-md-6">
            <h3>Invoice</h3>
        </div>
        <div class="col-12 col-md-6">
            <form wire:submit.prevent="submit" class="pt-3">
                <div class="mb-3 {{ $errors->has('invoice.invoice_number') ? 'invalid' : '' }}">
                    <label class="form-label" for="invoice_number">{{ trans('cruds.invoice.fields.invoice_number') }}</label>
                    <input class="form-control" type="text" name="invoice_number" id="invoice_number" wire:model.defer="invoice.invoice_number" readonly>
                    <div class="validation-message">
                        {{ $errors->first('invoice.invoice_number') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.invoice.fields.invoice_number_helper') }}
                    </div>
                </div>
                <div class="mb-3 {{ $errors->has('invoice.client_id') ? 'invalid' : '' }}">
                    <label class="form-label" for="client">{{ trans('cruds.invoice.fields.client') }}</label>
                    <x-select-list class="form-control" id="client_id" name="client_id" :options="$this->listsForFields['client']" wire:model="invoice.client_id" />
                    <div class="validation-message">
                        {{ $errors->first('invoice.client_id') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.invoice.fields.client_helper') }}
                    </div>
                </div>
                <div class="mb-3 {{ $errors->has('invoice.date_issued') ? 'invalid' : '' }}">
                    <label class="form-label" for="date_issued">{{ trans('cruds.invoice.fields.date_issued') }}</label>
                    <input class="form-control" wire:model.defer="invoice.date_issued" id="date_issued" name="date_issued" />
                    <div class="validation-message">
                        {{ $errors->first('invoice.date_issued') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.invoice.fields.date_issued_helper') }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 {{ $errors->has('invoice.tax_1_rate') ? 'invalid' : '' }}">
                        <label class="form-label" for="tax_1_rate">{{ trans('cruds.invoice.fields.tax_1_rate') }}</label>
                        <input class="form-control" type="text" name="tax_1_rate" id="tax_1_rate" wire:model.defer="invoice.tax_1_rate">
                        <div class="validation-message">
                            {{ $errors->first('invoice.tax_1_rate') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.invoice.fields.tax_1_rate_helper') }}
                        </div>
                    </div>
                    <div class="col-8 {{ $errors->has('invoice.tax_1_desc') ? 'invalid' : '' }}">
                        <label class="form-label" for="tax_1_desc">{{ trans('cruds.invoice.fields.tax_1_desc') }}</label>
                        <input class="form-control" type="text" name="tax_1_desc" id="tax_1_desc" wire:model.defer="invoice.tax_1_desc">
                        <div class="validation-message">
                            {{ $errors->first('invoice.tax_1_desc') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.invoice.fields.tax_1_desc_helper') }}
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4 {{ $errors->has('invoice.tax_2_rate') ? 'invalid' : '' }}">
                        <label class="form-label" for="tax_2_rate">{{ trans('cruds.invoice.fields.tax_2_rate') }}</label>
                        <input class="form-control" type="text" name="tax_2_rate" id="tax_2_rate" wire:model.defer="invoice.tax_2_rate">
                        <div class="validation-message">
                            {{ $errors->first('invoice.tax_2_rate') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.invoice.fields.tax_2_rate_helper') }}
                        </div>
                    </div>
                    <div class="col-8 {{ $errors->has('invoice.tax_2_desc') ? 'invalid' : '' }}">
                        <label class="form-label" for="tax_2_desc">{{ trans('cruds.invoice.fields.tax_2_desc') }}</label>
                        <input class="form-control" type="text" name="tax_2_desc" id="tax_2_desc" wire:model.defer="invoice.tax_2_desc">
                        <div class="validation-message">
                            {{ $errors->first('invoice.tax_2_desc') }}
                        </div>
                        <div class="help-block">
                            {{ trans('cruds.invoice.fields.tax_2_desc_helper') }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 {{ $errors->has('invoice.days_payment_due') ? 'invalid' : '' }}">
                    <label class="form-label" for="days_payment_due">{{ trans('cruds.invoice.fields.days_payment_due') }}</label>
                    <input class="form-control" type="text" name="days_payment_due" id="days_payment_due" wire:model.defer="invoice.days_payment_due">
                    <div class="validation-message">
                        {{ $errors->first('invoice.days_payment_due') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.invoice.fields.days_payment_due_helper') }}
                    </div>
                </div>
                <div class="mb-3 {{ $errors->has('invoice.payment_term') ? 'invalid' : '' }}">
                    <label class="form-label" for="payment_term">{{ trans('cruds.invoice.fields.payment_term') }}</label>
                    <input class="form-control" type="text" name="payment_term" id="payment_term" wire:model.defer="invoice.payment_term">
                    <div class="validation-message">
                        {{ $errors->first('invoice.payment_term') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.invoice.fields.payment_term_helper') }}
                    </div>
                </div>
                <div class="mb-3 {{ $errors->has('invoice.invoice_note') ? 'invalid' : '' }}">
                    <label class="form-label" for="invoice_note">{{ trans('cruds.invoice.fields.invoice_note') }}</label>
                    <textarea class="form-control" type="text" name="invoice_note" id="invoice_note" wire:model.defer="invoice.invoice_note"></textarea>
                    <div class="validation-message">
                        {{ $errors->first('invoice.invoice_note') }}
                    </div>
                    <div class="help-block">
                        {{ trans('cruds.invoice.fields.invoice_note_helper') }}
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary mx-1" type="submit">
                        {{ trans('global.save') }}
                    </button>
                    <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">
                        {{ trans('global.cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            @livewire('invoice-item.show', ['invoice'=>$invoice])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            @livewire('invoice-payment.show', ['invoice'=>$invoice])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            @livewire('invoice-history.show', ['invoice'=>$invoice])
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var simulateClick = function (elem) {
            var evt = new MouseEvent('click', {
                bubbles: true,
                cancelable: true,
                view: window
            });
            var canceled = !elem.dispatchEvent(evt);
        };

        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('close-item-modal', event => {
                var cCloseButton = document.querySelector('.c-close-item-modal');
                simulateClick(cCloseButton);
                var eCloseButton = document.querySelector('.e-close-item-modal');
                simulateClick(eCloseButton);
                var dCloseButton = document.querySelector('.d-close-item-modal');
                simulateClick(dCloseButton);
            });
            window.addEventListener('close-payment-modal', event => {
                var cCloseButton = document.querySelector('.c-close-payment-modal');
                simulateClick(cCloseButton);
                var eCloseButton = document.querySelector('.e-close-payment-modal');
                simulateClick(eCloseButton);
                var dCloseButton = document.querySelector('.d-close-payment-modal');
                simulateClick(dCloseButton);
            });
            window.addEventListener('close-history-modal', event => {
                var cCloseButton = document.querySelector('.c-close-history-modal');
                simulateClick(cCloseButton);
                var eCloseButton = document.querySelector('.e-close-history-modal');
                simulateClick(eCloseButton);
                var dCloseButton = document.querySelector('.d-close-history-modal');
                simulateClick(dCloseButton);
            });
        }, false);
    </script>
@endpush
