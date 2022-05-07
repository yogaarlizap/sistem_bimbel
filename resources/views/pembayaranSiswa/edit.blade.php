<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form class="form-horizontal" data-toggle="validator" method="PATCH">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengajar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <select name="name" id="name" class="form-control" style="width: 100%;height:100%">
                                    @foreach ($siswa as $opt)
                                        <option value="{{ $opt->id }}">{{ $opt->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal_diterima">Pembayaran Diterima (Rp.)</label>
                        <input type="number" name="nominal_diterima" id="nominal_diterima" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nominal_tertunggak">Pembayaran Tersisa (Rp.)</label>
                        <input type="number" name="nominal_tertunggak" id="nominal_tertunggak" class="form-control" min="0">
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