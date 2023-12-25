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
                            <td>{{ $row->return_date }}</td>
                            <td class="d-flex ">
                                <button onclick="getID('<?= $row->id ?>')" data-id="{{ $row->id }}" type="button" id="edit-book" class="btn btn-primary rounded-circle" style="width: 40px; height: 40px" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('books.delete', $row->id) }}">

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="hidden" name="id" value="{{ $row->id }}" />
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger rounded-circle ml-2" style="width: 40px; height: 40px">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>

<script>
    const elAdd = document.getElementById('add-book')
    elAdd.onclick = () => {
        $('#exampleModalLongTitle').html("Tambah Buku");
        $('#btn-submit').html("Tambah");
        $('#meth').val("POST");
        $('#id').val('');
        $('#image').val('');
        $('#title').val('');
        $('#author').val('');
        // $('#publisher').val('');
        $('#number_of_books').val('');
    }

    function getID(id){
        $.get('books/'+id, function (data) {
            $('#exampleModalLongTitle').html("Edit Buku");
            $('#btn-submit').html("Edit");
            $('#meth').val("PUT");
            $('#id').val(data.id);
            $('#title').val(data.title);
            $('#author').val(data.author);
            $('#publisher').val(data.publisher.id);
            $('#number_of_books').val(data.number_of_books);
        })
    }


</script>

@endsection

