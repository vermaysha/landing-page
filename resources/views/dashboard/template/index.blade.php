@extends('dashboard.layouts.dashboard')

@section('pageTitle', 'Template')

@section('pageContent')
    @include('dashboard.template.pageHeader')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                @if ($errors->any() || session('success'))
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class="d-flex">
                                            <div>
                                                <i class="ti ti-alert-circle icon alert-icon"></i>
                                            </div>
                                            <div>
                                                <h4 class="alert-title">Validation Error!</h4>
                                                <div class="text-secondary">{{ $error }}</div>
                                            </div>
                                        </div>
                                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                @endforeach
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <div class="d-flex">
                                            <div>
                                                <i class="ti ti-check icon alert-icon"></i>
                                            </div>
                                            <div>
                                                <h4 class="alert-title">Success!</h4>
                                                <div class="text-secondary">{{ session('success') }}</div>
                                            </div>
                                        </div>
                                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Template</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-wrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Creation Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $row)
                                        <tr>
                                            <td><span class="text-secondary">{{ $loop->iteration }}</span></td>
                                            <td>
                                                <a target="_blank" href="{{ asset('storage/' . $row->image) }}">
                                                    <img src="{{ asset('storage/' . $row->thumbnail) }}"
                                                    alt="{{ $row->title }}" class="avatar avatar-md">
                                                </a>
                                            </td>
                                            <td>{{ Str::limit($row->title, 30) }}</td>
                                            <td class="text-wrap">
                                                {{ Str::limit($row->description, 30) }}
                                            </td>
                                            <td>
                                                {{ $row->created_at?->isoFormat('dddd, DD MMMM YYYY') ?? '-' }}
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-primary btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-template-view-{{ $row->id }}">
                                                    <i class="ti ti-eye icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-info btn-icon" data-bs-toggle="modal"
                                                    data-bs-target="#modal-template-edit-{{ $row->id }}">
                                                    <i class="ti ti-pencil icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-template-{{ $row->id }}">
                                                    <i class="ti ti-x icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $templates->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-print-none">
        @include('dashboard.template.createModal')

        @foreach ($templates as $row)
            @include('dashboard.template.editModal')
            @include('dashboard.template.viewModal')
            @include('dashboard.template.deleteModal')
        @endforeach
    </div>
@endsection

