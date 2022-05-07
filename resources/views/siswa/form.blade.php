<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" data-toggle="validator" method="POST">
        @csrf
        @method('POST')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="no_telpon">Nomor Telpon</label>
            <input type="text" name="no_telpon" id="no_telpon" class="form-control">
          </div>
          <div class="form-group">
            <label for="orangtua">Nama Orang Tua</label>
            <input type="text" name="orangtua" id="orangtua" class="form-control">
          </div>
          <div class="form-group">
            <label for="no_telpon_orangtua">Nomor Telpon Orang Tua</label>
            <input type="text" name="no_telpon_orangtua" id="no_telpon_orangtua" class="form-control">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>