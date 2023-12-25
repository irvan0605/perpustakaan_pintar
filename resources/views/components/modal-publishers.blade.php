<div>
    <div class="modal fade" id="modalPublishers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('publishers.add') }}" id="form-modal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="meth" id="meth">
                        <div class="">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Kode Penerbit<span class="small text-danger">*</span></label>
                                        <input type="text" id="code_publisher" class="form-control" name="code_publisher" placeholder="Masukkan Kode Penerbit">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Nama Penerbit<span class="small text-danger">*</span></label>
                                        <input type="text" id="name_publisher" class="form-control" name="name_publisher" placeholder="Masukkan Nama Penerbit">
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
