<div class="modal modal-blur fade" id="modal-plan-view-{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <form action="{{ route('dashboard.plan.update', ['id' => $row->id]) }}" method="post">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Plan: {{ $row->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Title</div>
                            <div class="datagrid-content">{{ $row->title }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Subtitle</div>
                            <div class="datagrid-content">{{ $row->subtitle }}</div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Price</div>
                            <div class="datagrid-content">
                                {{ rupiah($row->price) }}
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Is Popular</div>
                            <div class="datagrid-content">
                                @if ($row->is_popular)
                                    <span class="status status-green">Yes</span>
                                @else
                                    <span class="status status-red">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Show on homepage</div>
                            <div class="datagrid-content">
                                @if ($row->show_on_homepage)
                                    <span class="status status-green">Yes</span>
                                @else
                                    <span class="status status-red">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Icon</div>
                            <div class="datagrid-content">
                                <img class="img-fluid img-thumbnail rounded" style="max-width: 200px;" alt="" src="{{ asset('storage/' .$row->icon_file) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>Checked</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($row->items as $item)
                            <tr>
                                <td>{{ $item->content }}</td>
                                <td>
                                    @if ($item->is_checked)
                                        <span class="badge bg-green text-green-fg">Yes</span>
                                    @else
                                        <span class="badge bg-red text-red-fg">No</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
