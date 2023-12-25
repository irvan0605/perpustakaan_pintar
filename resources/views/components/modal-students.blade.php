<div>
    <div class="modal fade" id="modalStudents" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('students.add') }}" id="form-modal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="meth" id="meth">
                        <div class="">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">NIM<span class="small text-danger">*</span></label>
                                        <input type="number" id="nim" class="form-control" name="nim" placeholder="Masukkan NIM">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Nama<span class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Masukkan Nama">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Prodi<span class="small text-danger">*</span></label>
                                        <select class="form-control" id="study_program" name="study_program">
                                            <option value="informatika" selected>Informatika</option>
                                            <option value="teknologi informasi">Teknologi Informasi</option>
                                            <option value="sistem informasi">Sistem Informasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Kelas<span class="small text-danger">*</span></label>
                                        <select class="form-control" id="class" name="class">
                                            <option value="reguler" selected>Reguler</option>
                                            <option value="karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Semester<span class="small text-danger">*</span></label>
                                        <input type="number" id="semester" class="form-control" name="semester" >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" id="btn-submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
