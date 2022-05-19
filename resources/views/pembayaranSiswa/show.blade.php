<!-- Modal -->
<div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pengajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nominal_diterima">Pembayaran Diterima (Rp.)</label>
                    <input type="number" name="nominal_diterima" id="nominal_diterima" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="nominal_tertunggak">Pembayaran Tersisa (Rp.)</label>
                    <input type="number" name="nominal_tertunggak" id="nominal_tertunggak" class="form-control" min="0" disabled>
                </div>
                <div class="form-group">
                    <label for="type_pembayaran">Type Pembayaran</label>
                    <input type="text" name="type_pembayaran" id="type_pembayaran" class="form-control" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
  </div>
</div>