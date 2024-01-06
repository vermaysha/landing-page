<div class="modal modal-blur fade" id="modal-portfolio-edit-{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.portfolio.update', ['id' => $row->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg modal-fullscreen-lg-down modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Portfolio: {{ $row->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="Plan title" required
                                    name="title" value="{{ old('title', $row->title) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" placeholder="Short description" required>{{ old('description', $row->description) }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                @php
                                    $selectedTags = implode(',', collect($row->tags)->pluck('name')->toArray());
                                @endphp
                                <input type="text" name="tags" class="form-control"
                                    placeholder="Select or type your tags" required value="{{ old('tags', $selectedTags) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-label">Image</div>
                                <input type="file" class="form-control" name="image"
                                    onchange="preview(event, 'editImage{{ $row->id }}')">
                            </div>
                        </div>
                        <div class="col-12" id="editImage{{ $row->id }}">
                            <div class="text-center">
                                <img class="img-fluid img-thumbnail rounded" style="max-width: 200px;" src="{{ asset('storage/' . $row->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <i class="ti ti-edit icon"></i>
                        Edit portfolio
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
