<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" data-toggle="validator" method="PATCH">
        @csrf
        @method('PATCH')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <select name="name" id="name" class="form-control" style="width: 100%;height:100%">
              @foreach ($siswa as $opt)
                <option value="{{ $opt->id }}">{{ $opt->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nilai_angka">Nilai Angka (1-100)</label>
            <input type="number" name="nilai_angka" class="form-control" id="nilai_angka" min="0" max="100">
          </div>
          <div class="form-group">
            <label for="nilai_huruf">Nilai Huruf</label>
            <input type="text" name="nilai_huruf" id="nilai_huruf" class="form-control" pattern="[A-Za-z]" style="text-transform:uppercase" >
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