@extends ('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mahasiswa</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">List Mahasiswa</h6>
            <button class="btn btn-primary" id="add-student" data-toggle="modal" data-target="#modalStudents">
                + Tambah Mahasiswa
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                    @foreach ($widget['data'] as $index => $row)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $row->nim }}</td>
                            <td class="text-capitalize">{{ $row->name }}</td>
                            <td class="text-capitalize">{{ $row->study_program }}</td>
                            <td class="text-capitalize">{{ $row->class }}</td>
                            <td>{{ $row->semester }}</td>
                            <td class="d-flex ">
                                <button onclick="getID('<?= $row->id ?>')" data-id="{{ $row->id }}" type="button" id="edit-book" class="btn btn-primary rounded-circle" style="width: 40px; height: 40px" data-toggle="modal" data-target="#modalStudents">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form method="POST" action="{{ route('students.delete', $row->id) }}">

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
    <x-modal-students />
</div>

<script>
    const elAdd = document.getElementById('add-student')
    elAdd.onclick = () => {
        $('#exampleModalLongTitle').html("Tambah mahasiswa");
        $('#btn-submit').html("Tambah");
        $('#meth').val("POST");
        $('#id').val('');
        $('#nim').val('');
        $('#name').val('');
        $('#study_program').val('informatika');
        $('#class').val('reguler');
        $('#semester').val('');
    }

    function getID(id){
        $.get('students/'+id, function (data) {
            $('#exampleModalLongTitle').html("Edit Mahasiswa");
            $('#btn-submit').html("Edit");
            $('#meth').val("PUT");
            $('#id').val(data.id);
            $('#nim').val(data.nim);
            $('#name').val(data.name);
            $('#study_program').val(data.study_program);
            $('#class').val(data.class);
            $('#semester').val(data.semester);
        })
    }


</script>

@endsection

