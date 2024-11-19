@extends('admin.layout.master')

@section('title', 'Danh sách yêu cầu đặt xe')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách yêu cầu đặt xe</h4>
                        <form action="" method="post" style="width: 300px" id="email-form">
                            <div class="input-group d-flex">
                                <input type="text" name="email" id="email" value="{{ env('MAIL_TO') }}"
                                    placeholder="Nhập email nhận thông báo" class="form-control">
                                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Xe</th>
                                        <th>Dịch vụ</th>
                                        <th>Ngày thuê</th>
                                        <th>Số ngày thuê</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Thời gian tạo</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Xe</th>
                                        <th>Dịch vụ</th>
                                        <th>Ngày thuê</th>
                                        <th>Số ngày thuê</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Thời gian tạo</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($bookingRequests as $item)
                                        <tr>
                                            <td>{{ $item->car->name }}</td>
                                            <td>{{ $item->type->name }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->rental_days }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
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
    <script src="{{ asset('frontend/assets/js/toastr.js') }}"></script>
    <script>
        $(document).ready(function() {
            dataTableRental([0, 1, 2, 3, 4, 5, 7])
        });

        $('#email-form').submit(function(e) {
            e.preventDefault();
            var email = $('#email').val();
            $.ajax({
                url: '{{ route('admin.booking.email') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email
                },
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(error) {
                    toastr.error(error.responseJSON.message);
                }
            })
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
@endpush
