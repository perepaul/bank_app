@php
    $page_data['event'] = "launchNewModal()";
@endphp
@extends('layouts.admin_app')
@section('content')
    <table class="table table-striped table-hover text-sm">
        <thead class="thead-dark">
            <tr>
                <th>User ID</th>
                <th>Account No.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->account_id}}</td>
                    <td>{{$user->account_number}}</td>
                    <td>{{$user->last_name.' '.$user->first_name}}</td>
                    <td>@include('layouts.global_components.dashboard.status',['status'=>$user->status])</td>
                    <td>{{$user->created_at->format('D M, Y')}}</td>
                    <td>@include('layouts.global_components.dashboard.action_btns')</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade user-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="account_id">Account #</label>
                                    <input type="text" class="form-control" id="account_id" name="account_id" placeholder="123456" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" placeholder="123456" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Last Name" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" >
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="banlance">Banlance</label>
                                    <input type="text" class="form-control" id="banlance">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option selected>Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">In Active</option>
                                        <option value="3">On Hold</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row" id="last-row">

                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option selected>Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submit-btn">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script>
        var elements;
        $('.user-modal').on('hide.bs.modal', function (e) {
            if($('#user_image').length)
            {
                $('#user_image').remove();
            }

            if($('#upload_image_wrapper').length)
            {
                $('#upload_image_wrapper').remove();
            }

            $('#submit-btn').removeAttr('disabled')

            ReadOnly(elements,true)
        })

        function launchNewModal(){
            $('#upload_image_wrapper').remove();
            __fillModalData('new')
            $('.user-modal').modal();
        }

        function launchViewModal(mode,data){
            __fillModalData(mode,data,true);
            $('.user-modal').modal();
        }
        function launchEditModal(mode, data){
            __fillModalData(mode,data);
            $('.user-modal').modal();
        }

        function __addFileInput(){
            return '<div class="form-group col-md-6" id="upload_image_wrapper"><label for="image">Account Picture</label><input type="file" class="form-control-file" name="image" id="image"></div>'
        }
        function __fillModalData(mode = 'new', data = {}, readonly = false )
        {
            var form = $('.modal form');
            image = "<center id='user_image'><img src="+data.image+" class='img-responsive rounded-circle' style='height:6rem;width:6rem; margin-left:auto'><br/></center>"

            var submit_btn = $(form).find('#submit-btn');
            el = elements = $(form).find('input, select').not('input[type="hidden"]');


  
        if(mode != 'new'){

            $(el['0']).val(data.account_id)
            $(el['1']).val(data.account_number);
            $(el['2']).val(data.first_name);
            $(el['3']).val(data.last_name)
            $(el['4']).val(data.email)
            $(el['5']).val(data.visible_password)
            $(el['6']).val(data.address)
            $(el['7']).val(data.balance)
            $(el['8']).val(data.status)
            $(el['9']).val(data.gender)
            $(form).find('.modal-body').prepend(image);
        }

        $(form).find('#last-row').append(__addFileInput());


            if(readonly)
            {
                ReadOnly(el);

            }
            if(mode == 'new')
            {
                $(form).attr('action',"{{route('adduser')}}");

                $(submit_btn).text('Create');
            }
            else if(mode == 'edit'){
                $(form).attr('action',"/updateuser/"+data.id);
                $(submit_btn).text('Update');


            }else if(mode == 'view'){
                $(submit_btn).attr('disabled',true);

            }
        }

        function ReadOnly(eles, unset=false)
        {
            $(eles).each(function(index, ele){
                if(unset == true){
                    $(ele).removeAttr('disabled')
                    $(ele).val('')

                }else{

                    $(ele).attr('disabled','true')
                }
            });
        }
    </script>
@endsection
