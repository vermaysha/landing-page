@extends('dashboard.layouts.dashboard')

@section('pageTitle', 'Testimonials')

@section('pageContent')
    @include('dashboard.testimonial.pageHeader')
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
                            <h3 class="card-title">Testimonials</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Client</th>
                                        <th>Job Title</th>
                                        <th>Testimonial</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $row)
                                        <tr>
                                            <td><span class="text-secondary">{{ $loop->iteration }}</span></td>
                                            <td>{{ $row->fullname }}</td>
                                            <td>
                                                {{ $row->job_title }}
                                            </td>
                                            <td>
                                                {{ Str::limit($row->content, 50) }}
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('dashboard.testimonial.toggle', ['id' => $row->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" name="is_active"
                                                            onchange="toggleStatus(this)" type="checkbox"
                                                            @checked($row->is_active)>
                                                        <span class="form-check-label"> Aktifkan</span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-primary btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-testimonial-view-{{ $row->id }}">
                                                    <i class="ti ti-eye icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-info btn-icon" data-bs-toggle="modal"
                                                    data-bs-target="#modal-testimonial-edit-{{ $row->id }}">
                                                    <i class="ti ti-pencil icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-testimonial-{{ $row->id }}">
                                                    <i class="ti ti-x icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $testimonials->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-print-none">
        @include('dashboard.testimonial.createModal')

        @foreach ($testimonials as $row)
            @include('dashboard.testimonial.editModal')
            @include('dashboard.testimonial.viewModal')
            @include('dashboard.testimonial.deleteModal')
        @endforeach
    </div>
@endsection

@push('head')
    <script>
        function toggleStatus(el) {
            const form = el?.parentElement?.parentElement

            if (form) {
                form.requestSubmit();
            }
        }
    </script>
@endpush
