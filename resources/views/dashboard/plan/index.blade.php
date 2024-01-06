@extends('dashboard.layouts.dashboard')

@section('pageTitle', 'Plan')

@section('pageContent')
    @include('dashboard.plan.pageHeader')

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
                            <h3 class="card-title">Plans</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Price</th>
                                        <th>Is Popular</th>
                                        <th>Show on Homepage ?</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $row)
                                        <tr>
                                            <td><span class="text-secondary">{{ $loop->iteration }}</span></td>
                                            <td>{{ Str::limit($row->title, 30) }}</td>
                                            <td>
                                                {{ Str::limit($row->subtitle, 30) }}
                                            </td>
                                            <td>
                                                @if (empty($row->price))
                                                Custom
                                                @else
                                                {{ rupiah($row->price) }}
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('dashboard.plan.togglePopular', ['id' => $row->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" name="is_popular"
                                                            onchange="toggleStatus(this)" type="checkbox"
                                                            @checked($row->is_popular)>
                                                        <span class="form-check-label"> Popular</span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('dashboard.plan.toggleShowOnHomepage', ['id' => $row->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <label class="form-check form-switch">
                                                        <input class="form-check-input" name="show_on_homepage"
                                                            onchange="toggleStatus(this)" type="checkbox"
                                                            @checked($row->show_on_homepage)>
                                                        <span class="form-check-label"> Show on Homepage ?</span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="text-end">
                                                <button type="button" class="btn btn-primary btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-plan-view-{{ $row->id }}">
                                                    <i class="ti ti-eye icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-info btn-icon" data-bs-toggle="modal"
                                                    data-bs-target="#modal-plan-edit-{{ $row->id }}">
                                                    <i class="ti ti-pencil icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-plan-{{ $row->id }}">
                                                    <i class="ti ti-x icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $plans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-print-none">
        @include('dashboard.plan.createModal')

        @foreach ($plans as $row)
            @include('dashboard.plan.editModal')
            @include('dashboard.plan.viewModal')
            @include('dashboard.plan.deleteModal')
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


@push('head')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
@endpush

@push('foot')
    <script>
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function addFeature(idEl) {
            const id = `${idEl}${randomNumber(10000, 999999)}`;
            const template = `
            <div class="row align-items-center mb-4" id="${id}">
                <div class="col-8">
                    <input type="text" class="form-control" name="items[${id}][title]"
                        placeholder="Feature title">
                </div>
                <div class="col text-center">
                    <label class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="items[${id}][checked]"
                            checked="">
                        <span class="form-check-label">Checked</span>
                    </label>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-danger btn-icon"
                        onclick="document.querySelector('#${id}').remove()">
                        <i class="ti ti-x icon"></i>
                    </button>
                </div>
            </div>
            `;

            $(`#${idEl}`).prepend(template)
        }
    </script>
    <script>
        function updateTextView(formatedId, realId) {
            const formated = document.getElementById(formatedId)
            const real = document.getElementById(realId)

            formated.value = formatNumber(formated.value)
            real.value = getNumber(formated.value)
        }

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }

        function getNumber(_str) {
            var arr = _str.split('');
            var out = new Array();
            for (var cnt = 0; cnt < arr.length; cnt++) {
                if (isNaN(arr[cnt]) == false) {
                    out.push(arr[cnt]);
                }
            }
            return Number(out.join(''));
        }
    </script>
@endpush
