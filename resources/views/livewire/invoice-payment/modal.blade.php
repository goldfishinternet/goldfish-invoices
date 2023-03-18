<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="invoicePaymentModal" tabindex="-1" aria-labelledby="invoicePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoicePaymentModalLabel">Create Invoice Payment</h5>
                <button type="button" class="btn-close close-payment-modals c-close-payment-modal" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveInvoicePayment">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Payment Note</label>
                        <textarea wire:model="payment_note" class="form-control"></textarea>
                        @error('payment_note') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Amount Paid</label>
                        <input type="text" wire:model="amount_paid" class="form-control">
                        @error('amount_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Date Paid</label>
                        <input type="text" wire:model="date_paid" class="form-control">
                        @error('date_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Invoice Payment Modal -->
<div wire:ignore.self class="modal fade" id="updateInvoicePaymentModal" tabindex="-1" aria-labelledby="updateInvoicePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInvoicePaymentModalLabel">Edit Invoice Payment</h5>
                <button type="button" class="btn-close close-payment-modals e-close-payment-modal" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateInvoicePayment">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Payment Note</label>
                        <textarea wire:model="payment_note" class="form-control"></textarea>
                        @error('payment_note') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Amount Paid</label>
                        <input type="text" wire:model="amount_paid" class="form-control">
                        @error('amount_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Date Paid</label>
                        <input type="text" wire:model="date_paid" class="form-control">
                        @error('date_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Invoice Payment Modal -->
<div wire:ignore.self class="modal fade" id="deleteInvoicePaymentModal" tabindex="-1" aria-labelledby="deleteInvoicePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteInvoicePaymentModalLabel">Delete Invoice Payment</h5>
                <button type="button" class="btn-close close-payment-modals d-close-payment-modal" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyInvoicePayment">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
