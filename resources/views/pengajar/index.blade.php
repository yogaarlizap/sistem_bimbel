@extends('layouts.layout')

@section('title')
    Data Pengajar
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Pengajar</li>
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
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">E-Mail</th>
                                <th class="align-middle">Nomor Telpon</th>
                                <th class="align-middle">Alamat</th>
                                <th class="align-middle">Pendidikan</th>
                                <th class="align-middle" width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajar as $list)
                                <tr>
                                    <td class="align-middle">
                                        {{ ++$no }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->user['name'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->user['email'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->nomor_telpon }}
                                    </td>
                                    <td class="align-middle">
                                        {{ Str::limit($list->alamat, 20, '...') }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->pendidikan_terakhir }}
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

    @include('pengajar.form')
    @include('pengajar.show')
    @include('pengajar.edit')
    @include('pengajar.delete')
@endsection

@section('script')
    <script>
        $(function(){
            $('#table').DataTable({
                lengthMenu: [5, 10, 20, 50],
                autoWidth: true,
            });
        })

        function addForm(){
            $('#modal-add').modal('show');
            $('#modal-add form')[0].reset();
            $('#modal-add form').validator().on('submit', function(e){
                if(!e.isDefaultPrevented()){
                    $.ajax({
                        url : "{{ route('pengajar.store') }}",
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
                url: "pengajar/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-show').modal('show');
                    $('#modal-show #name').val(data.user.name);
                    $('#modal-show #email').val(data.user.email);
                    $('#modal-show #pendidikan').val(data.pendidikan_terakhir);
                    $('#modal-show #asal_pendidikan').val(data.asal_pendidikan);
                    $('#modal-show #no_telpon').val(data.nomor_telpon);
                    $('#modal-show #alamat').val(data.alamat);
                },
                error: function(){
                    alert("Gagal menampilkan data!")
                }
            })
        }

        function editButton(id){
            $.ajax({
                url: "pengajar/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-edit').modal('show');
                    $('#modal-edit #id').val(data.id);
                    $('#modal-edit #name').val(data.user.name);
                    $('#modal-edit #email').val(data.user.email);
                    $('#modal-edit #pendidikan').val(data.pendidikan_terakhir);
                    $('#modal-edit #asal_pendidikan').val(data.asal_pendidikan);
                    $('#modal-edit #no_telpon').val(data.nomor_telpon);
                    $('#modal-edit #alamat').val(data.alamat);
                    $('#modal-edit form').validator().on('submit', function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "pengajar/"+id,
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
                url: "pengajar/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-delete').modal('show');
                    $('#text').html("Anda yakin ingin menghapus "+data.user.name+"?");
                    $('#modal-delete').validator().on('click', '#deleteButton',function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "pengajar/"+id,
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