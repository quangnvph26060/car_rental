@extends('admin.layout.master')
@section('title')
   Thông tin liên hệ
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Thông tin liên hệ</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Cập nhật thông tin</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Cập nhật thông tin</div>
                    </div>
                    <form method="POST" action="{{ route('admin.contact.updateContactInfo') }}" autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <!-- Trụ sở chính và Nhân viên tư vấn -->
                            <div class="row">
                                <!-- Trụ sở chính -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="headquarters">Trụ sở chính <code>*</code></label>
                                        <textarea class="form-control @error('headquarters') is-invalid @enderror" id="headquarters"
                                            name="headquarters" placeholder="Nhập trụ sở chính">{{ old('headquarters', $contact->headquarters ?? '') }}</textarea>
                                        @error('headquarters')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Thời gian làm việc -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="working_hours">Thời gian làm việc <code>*</code></label>
                                        <textarea class="form-control @error('working_hours') is-invalid @enderror" id="working_hours"
                                            name="working_hours" placeholder="Nhập thời gian làm việc">{{ old('working_hours', $contact->working_hours ?? '') }}</textarea>
                                        @error('working_hours')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Thời gian làm việc và Thủ tục đặt xe -->
                            <div class="row">
                                <!-- Nhân viên tư vấn -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="advisory">Nhân viên Tư Vấn <code>*</code></label>
                                        <input type="text" class="form-control @error('advisory') is-invalid @enderror" id="advisory"
                                            name="advisory" value="{{ old('advisory', $contact->advisory ?? '') }}" placeholder="Nhập nhân viên tư vấn">
                                        @error('advisory')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Thủ tục đặt xe -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="booking_procedure">Thủ tục đặt xe <code>*</code></label>
                                        <input type="text" class="form-control @error('booking_procedure') is-invalid @enderror" id="booking_procedure"
                                            name="booking_procedure" value="{{ old('booking_procedure', $contact->booking_procedure ?? '') }}" placeholder="Nhập thủ tục đặt xe">
                                        @error('booking_procedure')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Nút Gửi -->
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary w-100">Cập Nhật Thông Tin</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        // Khởi tạo CKEditor cho các trường textarea
        ClassicEditor
            .create(document.querySelector('#headquarters'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#working_hours'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
