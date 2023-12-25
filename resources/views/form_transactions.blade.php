@extends ('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transaksi Peminjaman</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('form_transactions.add') }}" id="form-modal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="meth" id="meth">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused d-flex flex-row align-items-center">
                                    <label class="form-control-label w-25" for="name">Nama Mahasiswa<span class="small text-danger">* :</span></label>
                                    <select class="form-control" id="student" name="student">
                                        @foreach ($widget['students'] as $index => $row)
                                            <option value="{{ $row->id }}" selected>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused d-flex flex-row align-items-center">
                                    <label class="form-control-label w-25" for="name">Judul Buku<span class="small text-danger">* :</span></label>
                                    <select class="form-control" id="book" name="book">
                                        @foreach ($widget['books'] as $index => $row)
                                        <option value="{{ $row->id }}" selected>{{$row->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group d-flex flex-row align-items-center">
                                    <label class="form-control-label w-25" for="email">Tanggal Pinjam<span class="small text-danger">* :</span></label>
                                    <input type="hidden" id="loan_date" name="loan_date" value="{{ $widget['loan_date'] }}">
                                    <span class="w-100">{{ $widget['loan_date'] }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group d-flex flex-row align-items-center">
                                    <label class="form-control-label w-25" for="email">Tanggal Kembali<span class="small text-danger">* :</span></label>
                                    <input type="hidden" id="return_date" name="return_date" value="{{ $widget['return_date'] }}">
                                    <span class="w-100">{{ $widget['return_date'] }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>

</div>
@endsection

