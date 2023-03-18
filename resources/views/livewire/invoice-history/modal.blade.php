<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="invoiceHistoryModal" tabindex="-1" aria-labelledby="invoiceHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceHistoryModalLabel">Create Invoice History</h5>
                <button type="button" class="btn-close close-history-modals c-close-history-modal" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveInvoiceHistory">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Recipient</label>
                        <input type="text" wire:model="recipient" class="form-control">
                        @error('recipient') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea wire:model="message" class="form-control"></textarea>
                        @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Date Sent</label>
                        <input type="text" wire:model="date_sent" class="form-control">
                        @error('date_sent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="c-send" type="checkbox" wire:model="send" class="form-check-input">
                            <label for="c-send" class="form-check-label">Send?</label>
                        </div>
                        @error('send') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="c-attach" type="checkbox" wire:model="attach" class="form-check-input">
                            <label for="c-attach" class="form-check-label">Attach?</label>
                        </div>
                        @error('attach') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Update Invoice History Modal -->
<div wire:ignore.self class="modal fade" id="updateInvoiceHistoryModal" tabindex="-1" aria-labelledby="updateInvoiceHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInvoiceHistoryModalLabel">Edit Invoice History</h5>
                <button type="button" class="btn-close close-history-modals e-close-history-modal" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateInvoiceHistory">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Recipient</label>
                        <input type="text" wire:model="recipient" class="form-control">
                        @error('recipient') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea wire:model="message" class="form-control"></textarea>
                        @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Date Sent</label>
                        <input type="text" wire:model="date_sent" class="form-control">
                        @error('date_sent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="e-send" type="checkbox" wire:model="send" class="form-check-input">
                            <label for="e-send" class="form-check-label">Send?</label>
                        </div>
                        @error('send') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input id="e-attach" type="checkbox" wire:model="attach" class="form-check-input">
                            <label for="e-attach" class="form-check-label">Attach?</label>
                        </div>
                        @error('attach') <span class="text-danger">{{ $message }}</span> @enderror
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

<!-- Delete Invoice History Modal -->
<div wire:ignore.self class="modal fade" id="deleteInvoiceHistoryModal" tabindex="-1" aria-labelledby="deleteInvoiceHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteInvoiceHistoryModalLabel">Delete Invoice History</h5>
                <button type="button" class="btn-close close-history-modals d-close-history-modal" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyInvoiceHistory">
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
