@extends('layouts.layout')

@section('title')
    Data Nilai Siswa
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Nilai Siswa</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="box-body justify-content-center mt-2">

                    <table class="table table-bordered table-hover text-center" id="table">
                        <thead class="align-middle">
                            <tr>
                                <th class="align-middle" width="30">No</th>
                                <th class="align-middle" width="100">Nama Siswa</th>
                                <th class="align-middle">Nilai Angka</th>
                                <th class="align-middle">Nilai Huruf</th>
                                <th class="align-middle">Tanggal</th>
                                <th class="align-middle" width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai_siswa as $list)
                                <tr>
                                    <td class="align-middle">
                                        {{ ++$no }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->siswa->nama }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->nilai_angka }}
                                    </td>
                                    <td class="align-middle" style="text-transform:uppercase">
                                        {{ $list->nilai_huruf }}
                                    </td>
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::parse($list->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn-sm" onclick="showButton({{ $list->id }})"><i class="fas fa-eye" style="color: #5762E3"></i></button>
                                        <button class="btn-sm" onclick="editButton({{ $list->id }})"><i class="fas fa-pencil-alt" style="color: #5762E3"></i></button>
                                        <button class="btn-sm" onclick="deleteButton({{ $list->id }})"><i class="fas fa-trash" style="color: #5762E3"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @include('nilaiSiswa.form')
    @include('nilaiSiswa.show')
    @include('nilaiSiswa.edit')
    @include('nilaiSiswa.delete')
@endsection

@section('script')
    <script>
        $(function(){
            $('#table').DataTable({
                lengthMenu: [5, 10, 20, 50],
                autoWidth: true
            });
            $('#name').select2();
        })

        function addForm(){
            $('#modal-add').modal('show');
            $('#modal-add form')[0].reset();
            $('#modal-add form').validator().on('submit', function(e){
                if(!e.isDefaultPrevented()){
                    $.ajax({
                        url : "{{ route('nilai_siswa.store') }}",
                        type : "POST",
                        data : $('#modal-add form').serialize(),
                        success : function(data){
                            $('#modal-add').modal('hide');
                            location.reload();
                        },
                        error : function(){
                            alert("Tidak dapat menyimpan data!");
                        }
                    });
                    return false;
                }
            });
        }

        function showButton(id){
            $.ajax({
                url: "nilai_siswa/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-show').modal('show');
                    $('#modal-show #name').val(data.siswa.nama);
                    $('#modal-show #nilai_angka').val(data.nilai_angka);
                    $('#modal-show #nilai_huruf').val(data.nilai_huruf);
                },
                error: function(){
                    alert("Gagal menampilkan data!")
                }
            })
        }

        function editButton(id){
            $.ajax({
                url: "nilai_siswa/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-edit').modal('show');
                    $('#modal-edit #name').select2();
                    $('#modal-edit #name').val(data.siswa_id).change();
                    $('#modal-edit #nilai_angka').val(data.nilai_angka);
                    $('#modal-edit #nilai_huruf').val(data.nilai_huruf);
                    $('#modal-edit form').validator().on('submit', function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "nilai_siswa/"+id,
                                type : "PATCH",
                                data : $('#modal-edit form').serialize(),
                                success : function(data){
                                    $('#modal-edit').modal('hide');
                                    location.reload();
                                },
                                error : function(){
                                    alert("Tidak dapat menyimpan data!");
                                }
                            });
                            return false;
                        }
                    });
                },
                error: function(){
                    alert("Gagal menampilkan data!")
                }
            })
        }

        function deleteButton(id){
            $.ajax({
                url: "nilai_siswa/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-delete').modal('show');
                    $('#text').html("Anda yakin ingin menghapus "+data.siswa.nama+"?");
                    $('#modal-delete').validator().on('click', '#deleteButton',function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "nilai_siswa/"+id,
                                type : "POST",
                                data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
                                success : function(data){
                                    $('#modal-delete').modal('hide');
                                    location.reload();
                                },
                                error : function(){
                                    alert("Tidak dapat menyimpan data!");
                                }
                            });
                            return false;
                        }
                    });
                },
                error: function(){
                    alert("Gagal mengambil data!")
                }
            });
        }
    </script>
@endsection