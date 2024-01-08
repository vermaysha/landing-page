<div class="modal modal-blur fade" id="modal-plan-edit-{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.plan.update', ['id' => $row->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg modal-fullscreen-lg-down modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Plan: {{ $row->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Plan title" required
                                    name="title" value="{{ old('title', $row->title) }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Subtitle</label>
                                <input type="text" class="form-control" placeholder="Plan subtitle" required
                                    name="subtitle" value="{{ old('subtitle', $row->subtitle) }}">
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
                                    <input type="text" class="form-control" name="price"
                                        onkeyup="updateTextView('formatedPrice', 'price')" placeholder="Price"
                                        autocomplete="off" id="formatedPrice" value="{{ $row->price }}">
                                    <input type="hidden" name="price_old" id="price" value="{{ $row->price }}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">&nbsp;</label>
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="show_on_homepage"
                                        @checked(old('show_on_homepage', $row->show_on_homepage) || true)>
                                    <span class="form-check-label">Show on Homepage</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-label">Icon</div>
                                <input type="file" class="form-control" name="icon_file"
                                    onchange="preview(event, 'previewImage{{ $row->id }}')">
                            </div>
                        </div>
                        <div class="col-12" id="previewImage{{ $row->id }}">
                            <div class="text-center">
                                <img class="img-fluid img-thumbnail rounded" style="max-width: 200px;" alt=""
                                    src="{{ asset('storage/' . $row->icon_file) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Plan Feature</div>
                                <button type="button" class="btn btn-success"
                                    onclick="addFeature('featureEdit{{ $row->id }}')"><i
                                        class="ti ti-plus icon"></i>
                                    Add Feature</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="featureEdit{{ $row->id }}">
                    @foreach ($row->items as $item)
                        <div class="row align-items-center mb-4" id="feature{{ $row->id . $item->id }}">
                            <div class="col-8">
                                <input type="text" class="form-control"
                                    name="items[feature{{ $row->id . $item->id }}][title]" placeholder="Feature title"
                                    value="{{ $item->content }}">
                            </div>
                            <div class="col text-center">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox"
                                        name="items[feature{{ $row->id . $item->id }}][checked]"
                                        @checked($item->is_checked)>
                                    <span class="form-check-label">Checked</span>
                                </label>
                            </div>
                            <div class="col text-end">
                                <button type="button" class="btn btn-danger btn-icon"
                                    onclick="document.querySelector('#feature{{ $row->id . $item->id }}').remove()">
                                    <i class="ti ti-x icon"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <i class="ti ti-edit icon"></i>
                        Edit plan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
