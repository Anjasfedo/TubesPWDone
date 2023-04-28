
  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog" role="document">
      <form action="" method="post" class="form-horizontal">
        @csrf
        @method("post")
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label for="id_karyawan" class="col-md-2 col-md-offset-1 control-label">Karyawan</label>
                <div class="col-md-9">
                    <select name="id_karyawan" id="id_karyawan" class="form-control" required>
                      <option value="">Pilih karyawan</option>
                      @foreach ($karyawan as $key => $item)
                          <option value="{{ $key }}">{{ $item }}</option>
                      @endforeach
                    </select>
                    <span class="help-block with-errors"></span>
                </div>
              </div>
            <div class="form-group row">
                <label for="nominal" class="col-lg-2 col-lg-offset-1 control-label">Nominal</label>
                <div class="col-lg-6">
                    <input type="number" name="nominal" id="nominal" class="form-control" required>
                    <span class="help-block with-errors"></span>
                </div>
            </div>
            </div>
              <div class="modal-footer">
                  <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
              </div>
            </div>
      </form>
    </div>
  </div>