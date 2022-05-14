@extends('layouts.layout')

@section('title')
    Data Siswa
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Siswa</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    @if (Auth::user()->role->name == "Superadmin" || Auth::user()->role->name == "Karyawan")
                        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                    @endif
                </div>
                <div class="box-body justify-content-center mt-2">

                    <table class="table table-bordered table-hover text-center" id="table">
                        <thead class="align-middle">
                            <tr>
                                <th class="align-middle" width="30">No</th>
                                <th class="align-middle" width="100">Nama Siswa</th>
                                <th class="align-middle" width="100">E-mail Siswa</th>
                                <th class="align-middle" width="100">Nama Orang Tua</th>
                                <th class="align-middle" width="100">No. Telpon Orang Tua</th>
                                <th class="align-middle" width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $list)
                                <tr>
                                    <td class="align-middle">
                                        {{ ++$no }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->nama }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->email }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->nama_orang_tua }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->no_telpon_ortu }}
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn-sm" onclick="showButton({{ $list->id }})"><i class="fas fa-eye" style="color: #5762E3"></i></button>
                                        @if (Auth::user()->role->name == "Superadmin" || Auth::user()->role->name == "Karyawan")
                                            <button class="btn-sm" onclick="editButton({{ $list->id }})"><i class="fas fa-pencil-alt" style="color: #5762E3"></i></button>
                                            <button class="btn-sm" onclick="deleteButton({{ $list->id }})"><i class="fas fa-trash" style="color: #5762E3"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    @include('siswa.form')
    @include('siswa.show')
    @include('siswa.edit')
    @include('siswa.delete')
@endsection

@section('script')
    <script>
        $(function(){
            $('#table').DataTable({
                lengthMenu: [5, 10, 20, 50],
                autoWidth: true
            });
        })

        function addForm(){
            $('#modal-add').modal('show');
            $('#modal-add form')[0].reset();
            $('#modal-add form').validator().on('submit', function(e){
                if(!e.isDefaultPrevented()){
                    $.ajax({
                        url : "{{ route('siswa.store') }}",
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
                url: "siswa/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-show').modal('show');
                    $('#modal-show #name').val(data.nama);
                    $('#modal-show #email').val(data.email);
                    $('#modal-show #no_telpon').val(data.no_telpon);
                    $('#modal-show #orangtua').val(data.nama_orang_tua);
                    $('#modal-show #no_telpon_orangtua').val(data.no_telpon_ortu);
                    $('#modal-show #alamat').val(data.alamat);
                },
                error: function(){
                    alert("Gagal menampilkan data!")
                }
            })
        }

        function editButton(id){
            $.ajax({
                url: "siswa/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-edit').modal('show');
                    $('#modal-edit #name').val(data.nama);
                    $('#modal-edit #email').val(data.email);
                    $('#modal-edit #no_telpon').val(data.no_telpon);
                    $('#modal-edit #orangtua').val(data.nama_orang_tua);
                    $('#modal-edit #no_telpon_orangtua').val(data.no_telpon_ortu);
                    $('#modal-edit #alamat').val(data.alamat);
                    $('#modal-edit form').validator().on('submit', function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "siswa/"+id,
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
                url: "siswa/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-delete').modal('show');
                    $('#text').html("Anda yakin ingin menghapus "+data.nama+"?");
                    $('#modal-delete').validator().on('click', '#deleteButton',function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "siswa/"+id,
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