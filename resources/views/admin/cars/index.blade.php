@extends('admin.layout.master')
@section('title')
    Danh sách xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách xe</h4>
                        <div>
                            <a href="{{ route('admin.car.create') }}" class="btn btn-success">Thêm xe</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên xe</th>
                                        <th>Giá</th>
                                        <th>Loại</th>
                                        <th>Hãng</th>
                                        <th>Trạng thái</th>
                                        <th>Yêu thích</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên loại</th>
                                        <th>Giá</th>
                                        <th>Loại</th>
                                        <th>Hãng</th>
                                        <th>Trạng thái</th>
                                        <th>Yêu thích</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if ($cars->isNotEmpty())
                                        @foreach ($cars as $car)
                                            <tr>
                                                <td><a
                                                        href="{{ route('admin.images.car.index', $car->slug) }}">{{ $car->name }}</a>
                                                </td>

                                                <td>{{ $car->price }}đ</td>
                                                <td>
                                                    @if ($car->types->count() > 0)
                                                        @foreach ($car->types as $type)
                                                            <div class="d-flex flex-wrap justify-content-start">
                                                                <span
                                                                    class="d-block badge text-bg-primary">{{ $type->name }}</span>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <span class="d-block badge text-bg-danger">Chưa thuộc loại xe
                                                            nào</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($car->brands->count() > 0)
                                                        @foreach ($car->brands as $brand)
                                                            <div class="d-flex flex-wrap justify-content-start">
                                                                <span
                                                                    class="d-block badge text-bg-primary">{{ $brand->name }}</span>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <span class="d-block badge text-bg-danger">Chưa thuộc hãng xe
                                                            nào</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <select name="status" data-id="{{ $car->id }}"
                                                        class="form-control change-status-car">
                                                        <option {{ $car->status == 1 ? 'selected' : '' }} value="1">
                                                            Công khai</option>
                                                        <option {{ $car->status == 0 ? 'selected' : '' }} value="0">
                                                            Không công khai</option>
                                                    </select>

                                                </td>
                                                <td>
                                                    <select name="is_favorite" data-id="{{ $car->id }}"
                                                        class="form-control change-is-favorite-car">
                                                        <option {{ $car->is_favorite == 1 ? 'selected' : '' }}
                                                            value="1">
                                                            Có</option>
                                                        <option {{ $car->is_favorite == 0 ? 'selected' : '' }}
                                                            value="0">
                                                            Không</option>
                                                    </select>

                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.car.edit', $car->id) }}"
                                                            class=" m-1 d-block btn btn-primary btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('admin.car.destroy', $car->id) }}"
                                                            class=" m-1 d-block btn btn-danger btn-sm delete-item"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

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
        $(document).on('change', '.change-status-car', function() {
            var carId = $(this).data('id');
            var status = $(this).find(":selected").val()
            $.ajax({
                url: '{{ route('admin.car.change.status') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    carId,
                    status
                },
                success: function(response) {
                    alert(response.success);
                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
        $(document).on('change', '.change-is-favorite-car', function() {
            var carId = $(this).data('id');
            var is_favorite = $(this).find(":selected").val()
            $.ajax({
                url: '{{ route('admin.car.change.favorite') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    carId,
                    is_favorite
                },
                success: function(response) {
                    alert(response.success);
                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            dataTableRental([0, 1])
        });
    </script>
@endpush
