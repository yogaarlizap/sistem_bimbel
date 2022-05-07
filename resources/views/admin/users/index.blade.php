@extends('layouts.layout')

@section('title')
    Data Users
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Users</li>
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
                                <th class="align-middle" width="100">Nama</th>
                                <th class="align-middle">E-mail</th>
                                <th class="align-middle">Role</th>
                                <th class="align-middle" width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $list)
                                <tr>
                                    <td class="align-middle">
                                        {{ ++$no }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->name }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->email }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $list->role->name }}
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

    @include('admin.users.form')
    @include('admin.users.show')
    @include('admin.users.edit')
    @include('admin.users.delete')
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
                        url : "{{ route('users.store') }}",
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
                url: "users/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-show').modal('show');
                    $('#modal-show #name').val(data.name);
                    $('#modal-show #email').val(data.email);
                    $('#modal-show #role').val(data.role.name);
                },
                error: function(){
                    alert("Gagal menampilkan data!")
                }
            })
        }

        function editButton(id){
            $.ajax({
                url: "users/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-edit').modal('show');
                    $('#modal-edit #id').val(data.id);
                    $('#modal-edit #name').val(data.name);
                    $('#modal-edit #email').val(data.email);
                    $('#modal-edit #role').val(data.role.name);
                    $('#modal-edit form').validator().on('submit', function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "users/"+id,
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
                url: "users/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modal-delete').modal('show');
                    $('#text').html("Anda yakin ingin menghapus "+data.name+"?");
                    $('#modal-delete').validator().on('click', '#deleteButton',function(e){
                        if(!e.isDefaultPrevented()){
                            $.ajax({
                                url : "users/"+id,
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