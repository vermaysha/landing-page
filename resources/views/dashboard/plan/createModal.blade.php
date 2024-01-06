<div class="modal modal-blur fade" id="modal-plan" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <form action="{{ route('dashboard.plan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg modal-fullscreen-lg-down modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Plan title" required
                                    name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Subtitle</label>
                                <input type="text" class="form-control" placeholder="Plan subtitle" required
                                    name="subtitle" value="{{ old('subtitle') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">
                                        Rp
                                    </span>
                                    <input type="text" class="form-control"
                                        onkeyup="updateTextView('formatedPrice', 'price')" placeholder="Price"
                                        autocomplete="off" id="formatedPrice">
                                    <input type="hidden" name="price" id="price">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">&nbsp;</label>
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="show_on_homepage"
                                        @checked(old('show_on_homepage') || true)>
                                    <span class="form-check-label">Show on Homepage</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-label">Icon</div>
                                <input type="file" class="form-control" name="icon_file" onchange="preview(event, 'preview-image')" required>
                            </div>
                        </div>
                        <div class="col-12" id="preview-image" style="display: none;">
                            <div class="text-center">
                                <img class="img-fluid img-thumbnail rounded" style="max-width: 200px;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Plan Feature</div>
                                <button type="button" class="btn btn-success" onclick="addFeature('featureCreate')"><i
                                        class="ti ti-plus icon"></i>
                                    Add Feature</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="featureCreate">
                    <div class="row align-items-center mb-4" id="feature1">
                        <div class="col-8">
                            <input type="text" class="form-control" name="items[feature1][title]"
                                placeholder="Feature title">
                        </div>
                        <div class="col text-center">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="items[feature1][checked]"
                                    checked="">
                                <span class="form-check-label">Checked</span>
                            </label>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-danger btn-icon"
                                onclick="document.querySelector('#feature1').remove()">
                                <i class="ti ti-x icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <i class="ti ti-plus icon"></i>
                        Create new plan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
