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
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Title<span class="small text-danger">*</span></label>
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Input Title Here">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Author<span class="small text-danger">*</span></label>
                                        <input type="text" id="author" class="form-control" name="author" placeholder="Input Author Here">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Publisher<span class="small text-danger">*</span></label>
                                        <input type="text" id="publisher" class="form-control" name="publisher" placeholder="Input Publisher Here">
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
<!--                <div class="modal-footer">-->
<!--                    <button type="submit" class="btn btn-primary">Add</button>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
