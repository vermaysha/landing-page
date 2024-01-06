@extends('dashboard.layouts.dashboard')

@section('pageTitle', 'Portfolio')

@section('pageContent')
    @include('dashboard.portfolio.pageHeader')
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
                            <h3 class="card-title">Portfolio</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-wrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Tags</th>
                                        <th>Creation Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portfolios as $row)
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
                                                @foreach ($row->tags as $tag)
                                                <span class="badge bg-blue text-blue-fg mb-2">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $row->created_at?->isoFormat('dddd, DD MMMM YYYY') ?? '-' }}
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-primary btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-portfolio-view-{{ $row->id }}">
                                                    <i class="ti ti-eye icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-info btn-icon" data-bs-toggle="modal"
                                                    data-bs-target="#modal-portfolio-edit-{{ $row->id }}">
                                                    <i class="ti ti-pencil icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-portfolio-{{ $row->id }}">
                                                    <i class="ti ti-x icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $portfolios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-print-none">
        @include('dashboard.portfolio.createModal')

        @foreach ($portfolios as $row)
            @include('dashboard.portfolio.editModal')
            @include('dashboard.portfolio.viewModal')
            @include('dashboard.portfolio.deleteModal')
        @endforeach
    </div>
@endsection


@push('head')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('foot')
    <script>
        (() => {
            const els = Array.from(document.querySelectorAll('input[name=tags]'))
            if (!els) {
                return;
            }

            els.forEach((el) => {
                const tagify = new Tagify(el, {
                    whitelist: {{ Js::from($tags) }},
                    maxTags: 5,
                    dropdown: {
                        maxItems: 10,
                        className: 'tags-block',
                        enabled: 0,
                        closeOnSelect: false,
                    }
                })
            })
        })();
    </script>
@endpush
