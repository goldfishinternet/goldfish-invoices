<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="invoiceItemModal" tabindex="-1" aria-labelledby="invoiceItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceItemModalLabel">Create Invoice Item</h5>
                <button type="button" class="btn-close close-item-modals c-close-item-modal" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveInvoiceItem">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea wire:model="work_description" class="form-control"></textarea>
                        @error('work_description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="text" wire:model="quantity" class="form-control">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Amount</label>
                        <input type="text" wire:model="amount" class="form-control">
                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="c-taxable" type="checkbox" wire:model="taxable" class="form-check-input">
                            <label for="c-taxable" class="form-check-label">Taxable?</label>
                        </div>
                        @error('taxable') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Update Invoice Item Modal -->
<div wire:ignore.self class="modal fade" id="updateInvoiceItemModal" tabindex="-1" aria-labelledby="updateInvoiceItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInvoiceItemModalLabel">Edit Invoice Item</h5>
                <button type="button" class="btn-close close-item-modals e-close-item-modal" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateInvoiceItem">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea wire:model="work_description" class="form-control"></textarea>
                        @error('work_description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="text" wire:model="quantity" class="form-control">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Amount</label>
                        <input type="text" wire:model="amount" class="form-control">
                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="e-taxable" type="checkbox" wire:model="taxable" class="form-check-input">
                            <label for="e-taxable" class="form-check-label">Taxable?</label>
                        </div>
                        @error('taxable') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Delete Invoice Item Modal -->
<div wire:ignore.self class="modal fade" id="deleteInvoiceItemModal" tabindex="-1" aria-labelledby="deleteInvoiceItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteInvoiceItemModalLabel">Delete Invoice Item</h5>
                <button type="button" class="btn-close close-item-modals d-close-item-modal" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyInvoiceItem">
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
