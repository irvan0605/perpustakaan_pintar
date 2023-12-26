@extends ('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transaksi</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">List Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Terlambat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                    @foreach ($widget['data'] as $index => $row)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $row->book->title }}</td>
                            <td>{{ $row->student->name }}</td>
                            <td>{{ $row->loan_date }}</td>
                            <td>{{ $row->original_return_date ? $row->original_return_date : $row->return_date }}</td>
                            <td>{{ $row->late }} Hari</td>
                            <td class="d-flex ">
                                @if($row->original_return_date)
                                    <span class="badge badge-success">Success</span>
                                @else
                                    <form method="POST" action="{{ route('transactions.return', $row->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <input type="hidden" name="id" value="{{ $row->id }}" />
                                        <div class="form-group mr-3">
                                            <button type="submit" class="btn btn-primary rounded-sm ml-2 w-100" style="width: 40px; height: 40px">
                                                Kembali
                                            </button>
                                        </div>
                                    </form>
                                    <button onclick="getID('<?= $row->id ?>')" data-id="{{ $row->id }}" type="button" id="edit-book" class="btn btn-success rounded-sm w-50" style="width: 40px; height: 40px" data-toggle="modal" data-target="#modalPerpanjang">
                                        Perpanjang
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <div class="modal fade" id="modalPerpanjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Perpanjang Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('transactions.extend') }}" id="form-modal" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="return_date" id="return_date">
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="email">Lama Perpanjangan (Hari)<span class="small text-danger">*</span></label>
                                            <input type="number" id="number_of_days" class="form-control" name="number_of_days">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" id="btn-submit" class="btn btn-primary">Perpanjang</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

<script>

    function getID(id){
        $.get('transactions/'+id, function (data) {
            $('#id').val(data.id);
            $('#return_date').val(data.return_date);
        })
    }

</script>

@endsection

