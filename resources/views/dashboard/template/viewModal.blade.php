<div class="modal modal-blur fade" id="modal-template-view-{{ $row->id }}" tabindex="-1" role="dialog"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.template.update', ['id' => $row->id]) }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Template: {{ $row->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Title</div>
                            <div class="datagrid-content">{{ $row->title }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Description</div>
                            <div class="datagrid-content">{{ $row->description }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Image</div>
                            <div class="datagrid-content">
                                <img class="img-fluid img-thumbnail rounded" style="max-width: 200px;" alt=""
                                    src="{{ asset('storage/' . $row->image) }}">
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
