<div class="modal modal-blur fade" id="modal-delete-template-{{ $row->id }}" tabindex="-1" role="dialog"
    aria-modal="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <form action="{{ route('dashboard.template.delete', ['id' => $row->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <i class="ti ti-alert-triangle icon mb-2 text-danger icon-lg"></i>
                    <h3>Are you sure?</h3>
                    <div class="text-secondary">Do you really want to delete template from
                        <strong>{{ $row->title }}</strong>? <br> What you've done cannot be undone.
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><button type="button" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </button></div>
                            <div class="col"><button type="submit" class="btn btn-danger w-100">
                                    Delete
                                </button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
