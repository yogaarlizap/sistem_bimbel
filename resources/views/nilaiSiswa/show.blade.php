<!-- Modal -->
<div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="nilai_angka">Nilai Angka (1-100)</label>
                    <input type="number" name="nilai_angka" class="form-control" id="nilai_angka" min="0" max="100" disabled>
                </div>
                <div class="form-group">
                    <label for="nilai_huruf">Nilai Huruf</label>
                    <input type="text" name="nilai_huruf" id="nilai_huruf" class="form-control" pattern="[A-Za-z]" style="text-transform:uppercase" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>