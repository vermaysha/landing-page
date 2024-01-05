<div class="modal modal-blur fade" id="modal-testimonial-view-{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.testimonial.update', ['id' => $row->id]) }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Testimonial: {{ $row->fullname }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Client Fullname</div>
                            <div class="datagrid-content">{{ $row->fullname }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Job Title</div>
                            <div class="datagrid-content">{{ $row->job_title }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content">
                                @if ($row->is_active)
                                    <span class="status status-green">Active</span>
                                @else
                                <span class="status status-red">Non-Active</span>
                                @endif
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Testimonial</div>
                            <div class="datagrid-content">
                                {{ $row->content }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
