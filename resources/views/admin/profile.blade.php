@extends('admin/layout/master')
@section('content')
@if(session()->has('success'))
    <div x-data="{ show: true }" x-show="show"
            class="flex justify-between items-center bg-yellow-200 relative text-yellow-600 py-3 px-3 rounded-lg">
        <div>
            <span class="font-semibold text-yellow-700"> {{session()->get('success')}}</span>
        </div>
        <div>
            <button type="button" @click="show = false" class=" text-yellow-700">
                <span class="text-2xl">&times;</span>
            </button>
        </div>
    </div>
@endif
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Profile Layout
    </h2>
</div>
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
            <?php if(image_exists(Auth::user('web')->profile_image)){ 
                $image = Auth::user('web')->profile_image; ?>
                <img alt="" class="rounded-full" src="{{asset('uploads/imgs/'.$image)}}">    
            <?php
            }else{ ?>
                <img alt="" class="rounded-full" src="{{asset('uploads/imgs/default.png')}}">
            <?php
            }
            ?>
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{Auth::user('web')->first_name}} {{Auth::user('web')->last_name}}</div>
                <!-- <div class="text-gray-600">DevOps Engineer</div> -->
            </div>
        </div>
        <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail" class="w-4 h-4 mr-2"></i> {{Auth::user('web')->email}} </div>
            <!-- <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="instagram" class="w-4 h-4 mr-2"></i> Instagram Johnny Depp </div> -->
            <!-- <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="twitter" class="w-4 h-4 mr-2"></i> Twitter Johnny Depp </div> -->
        </div>
        <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-lg">201</div>
                <div class="text-gray-600">Team Leads</div>
            </div>
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-lg">1k</div>
                <div class="text-gray-600">Team of</div>
            </div>
            <!-- <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 dark:text-theme-10 text-lg">492</div>
                <div class="text-gray-600">Reviews</div>
            </div> -->
        </div>
    </div>
    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
        <a data-toggle="tab" data-target="#profile" href="javascript:;" class="py-4 sm:mr-8 flex items-center active"> <i class="w-4 h-4 mr-2" data-feather="user"></i> Profile </a>
        <!-- <a data-toggle="tab" data-target="#account" href="javascript:;" class="py-4 sm:mr-8 flex items-center"> <i class="w-4 h-4 mr-2" data-feather="shield"></i> Account </a> -->
        <a data-toggle="tab" data-target="#change-password" href="javascript:;" class="py-4 sm:mr-8 flex items-center"> <i class="w-4 h-4 mr-2" data-feather="lock"></i> Change Password </a>
        <!-- <a data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center"> <i class="w-4 h-4 mr-2" data-feather="settings"></i> Settings </a> -->
    </div>
</div>
<div class="tab-content mt-5">
    <div class="tab-content__pane active" id="profile">
        <div class="grid grid-cols-12 gap-6">
            <div class="intro-y box col-span-12 lg:col-span-12">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Profile Information
                    </h2>
                    <div class="dropdown ml-auto sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700 dark:text-gray-300"></i> </a>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2"> <a href="javascript:;" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">All Files</a> </div>
                        </div>
                    </div>
                    <!-- <button class="button border text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex">All Files</button> -->
                </div>
                <div class="p-5">
                    <form action="{{route('admin.update.profile')}}" method="POST" enctype="multipart/form-data">    
                        @csrf
                        <div>
                            <label>First Name</label>
                            <input type="text" class="input w-full border mt-2" name="f_name" value="{{Auth::user('web')->first_name}}">
                        </div>
                        <div class="mt-3">
                            <label>Last Name</label>
                            <input type="text" class="input w-full border mt-2" name="l_name" value="{{Auth::user('web')->last_name}}">
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input type="email" class="input w-full border mt-2" name="email" value="{{Auth::user('web')->email}}">
                        </div>
                        <div class="mt-3">
                            <label>Image</label>
                            <input type="file"  name="profile_image" class="input w-full border mt-2" id="profile_image" onchange="loadPreview(this);" accept="image/x-png,image/jpg,image/jpeg">
                        </div>
                        <div class="mt-3" id="preview_img_div">
                            <div class="text-right">
                                <a id="cancel_preview" class="button button--sm w-34 inline-block mr-1 mb-2 bg-theme-6 text-white">X</a>
                            </div>
                            @php
                                $image_exist = 0;
                                $image = Auth::user('web')->profile_image;
                                if(image_exists($image)){
                                    $image_exist = 1;
                                }
                            @endphp
                            <div style="text-align: -webkit-center;">    
                                <img id="preview_img" src="{{asset('uploads/imgs/'.$image)}}" class="" width="200" height="150"/>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="button bg-theme-1 text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#cancel_preview').on('click',function(){
            $('#preview_img_div').hide();
            $("#profile_image").val(null);
        });
    });
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#preview_img_div').show();     
            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(200).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    remove_div({{$image_exist}});
    function remove_div(flag){
        if(!flag){
            $('#preview_img_div').hide();
        }
    }
</script>
@endsection