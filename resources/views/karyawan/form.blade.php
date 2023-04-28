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
                <label for="nama_karyawan" class="col-md-2 col-md-offset-1 control-label">Nama</label>
                <div class="col-md-9">
                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" required autofocus>
                    <span class="help-block with-errors"></span>
                </div>
              </div>
            <div class="form-group row">
              <label for="jabatan" class="col-md-2 col-md-offset-1 control-label">Kategori</label>
              <div class="col-md-9">
                  <select name="jabatan" id="jabatan" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Koki">Koki</option>
                    <option value="Pelayan">Pelayan</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Staf kebersihan">Staf kebersihan</option>
                  </select>
                  <span class="help-block with-errors"></span>
              </div>
            </div>
              <div class="form-group row">
                <label for="telepon" class="col-lg-2 col-lg-offset-1 control-label">Telepon</label>
                <div class="col-lg-6">
                    <input type="text" name="telepon" id="telepon" class="form-control" required>
                    <span class="help-block with-errors"></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-lg-2 col-lg-offset-1 control-label">Alamat</label>
                <div class="col-lg-6">
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
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