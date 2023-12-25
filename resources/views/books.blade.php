@extends ('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Katalog Buku</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">List Buku</h6>
            <button class="btn btn-primary" id="add-book" data-toggle="modal" data-target="#exampleModalCenter">
                + Add Book
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Jumlah Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                    @foreach ($widget['data'] as $index => $row)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td class="text-center">
                                <img src="/app/{{ $row->image }}" style="width: 100px" />
                            </td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->author }}</td>
                            <td>{{ $row->publisher->name_publisher }}</td>
                            <td>{{ $row->number_of_books }}</td>
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

    <!-- Modal -->
        <div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('books.add') }}" id="form-modal" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="meth" id="meth">
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label for="exampleFormControlFile1">Sampul</label>
                                                <input type="file" class="form-control-file" id="image" name="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="name">Judul<span class="small text-danger">*</span></label>
                                                <input type="text" id="title" class="form-control" name="title" placeholder="Masukan Judul">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Penulis<span class="small text-danger">*</span></label>
                                                <input type="text" id="author" class="form-control" name="author" placeholder="Masukan Penulis">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Penerbit<span class="small text-danger">*</span></label>
                                                <select class="form-control" id="publisher" name="publisher">
                                                    @foreach ($widget['listPublisher'] as $index => $row)
                                                    <option value="{{ $row->id }}" selected>{{$row->name_publisher}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Jumlah Buku<span class="small text-danger">*</span></label>
                                                <input type="number" id="number_of_books" class="form-control" name="number_of_books" placeholder="Masukan Jumlah Buku">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" id="btn-submit" class="btn btn-primary">Add</button>
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

