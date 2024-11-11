@extends('admin.layout.master')
@section('title')
    Danh sách loại xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Loại xe</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách loại xe</h4>
                        <div>
                            <a href="{{ route('admin.type-car.create') }}" class="btn btn-success">Thêm loại xe</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên loại</th>
                                        <th>Tiêu đề giới thiệu</th>
                                        <th>Mô tả ngắn</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên loại</th>
                                        <th>Tiêu đề giới thiệu</th>
                                        <th>Mô tả ngắn</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($types as $typeCar)
                                        <tr>
                                            <td>{{ $typeCar->name }}</td>
                                            <td>{{ $typeCar->title }}</td>
                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($typeCar->short_description)), 100) }}
                                            </td>

                                            <td>

                                                <div class="d-flex">
                                                    <a href="{{ route('admin.type-car.edit', $typeCar->id) }}"
                                                        class=" m-1 d-block btn btn-primary"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>


                                                    <a href="{{ route('admin.type-car.destroy', $typeCar->id) }}"
                                                        class=" m-1 d-block btn btn-danger delete-item"><i
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
            // $("#basic-datatables").DataTable({});

            $("#multi-filter-select").DataTable({
                pageLength: 5,
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-select"><option value=""></option></select>'
                                )
                                .appendTo($(column.footer()).empty())
                                .on("change", function() {
                                    var val =
                                        $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );

                                    column
                                        .search(
                                            val ? "^" + val + "$" : "",
                                            true,
                                            false
                                        )
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append(
                                        '<option value="' +
                                        d +
                                        '">' +
                                        d +
                                        "</option>"
                                    );
                                });
                        });
                },
            });
        });
    </script>
@endpush
