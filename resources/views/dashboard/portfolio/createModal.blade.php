<div class="modal modal-blur fade" id="modal-portfolio" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.portfolio.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg modal-fullscreen-lg-down modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Portfolio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Plan title" required
                                    name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Short description" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                <input type="text" name="tags" class="form-control"
                                    placeholder="Select or type your tags" required value="{{ old('tags') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-label">Image</div>
                                <input type="file" class="form-control" name="image"
                                    onchange="preview(event, 'image')" required>
                            </div>
                        </div>
                        <div class="col-12" id="image" style="display: none;">
                            <div class="text-center">
                                <img class="img-fluid img-thumbnail rounded" style="max-width: 200px;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <i class="ti ti-plus icon"></i>
                        Create new portfolio
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
