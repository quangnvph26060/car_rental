@extends('admin.layout.master')
@section('title')
    Danh sách hãng xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Hãng xe</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách hãng xe</h4>
                        <div>
                            <a href="{{ route('admin.brand-car.create') }}" class="btn btn-success">Thêm hãng xe</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên hãng</th>
                                        <th>Loại xe</th>
                                        <th>Tiêu đề giới thiệu</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên hãng</th>
                                        <th>Loại xe</th>
                                        <th>Tiêu đề giới thiệu</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->name }}</td>
                                            <td>{{ $brand->type->name ?? 'Không thuộc loại xe nào' }}</td>
                                            <td>{{ $brand->title ?? 'Không có tiêu đề giới thiệu' }}</td>
                                            <td>

                                                <div class="d-flex">
                                                    <a href="{{ route('admin.brand-car.edit', $brand->id) }}"
                                                        class=" m-1 d-block btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.brand-car.destroy', $brand->id) }}"
                                                        class="m-1 d-block btn btn-danger delete-item"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            dataTableRental([0,1,2])
        });
    </script>
@endpush
