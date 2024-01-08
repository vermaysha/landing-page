<div class="modal modal-blur fade" id="modal-testimonial-edit-{{ $row->id }}" tabindex="-1" role="dialog"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.testimonial.update', ['id' => $row->id]) }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Testimonial: {{ $row->fullname }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Fullname</label>
                                <input type="text" class="form-control" placeholder="Client fullname" required
                                    name="fullname" value="{{ $row->fullname }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Job Title</label>
                                <input type="text" class="form-control" placeholder="Client job title" required
                                    name="job_title" value="{{ $row->job_title }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Content</label>
                                <textarea class="form-control" rows="3" placeholder="Testimonial content" required name="content">{{ $row->content }}</textarea>
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
                        Update testimonial
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
