<div>
    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                        aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroy">
                    <div class="modal-body">
                        <h5>Are you sure you want to delete this data ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
