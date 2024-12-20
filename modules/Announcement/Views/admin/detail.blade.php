@extends('admin.layouts.app')

@section('content')
    <form class="needs-validation" action="{{route('announcement.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar">{{$row->id ? __('Edit: ').$row->title : __('Add new Announcement')}}</h1>
                </div>
            </div>
            @include('admin.message')
            @if($row->id)
                @include('Language::admin.navigation')
            @endif
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-title"><strong>{{ __('Announcement Type')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="">{{__('Type')}} <span class="text-danger">*</span></label>
                                    <div>
                                        <select name="via" class="form-control" id="announcement_type" required>
                                            <option value="email" @if(isset($row['via']) && $row['via'] == 'email') selected @endif>{{__("Email")}}</option>
                                            <option value="sms" @if(isset($row['via']) && $row['via'] == 'sms') selected @endif>{{__("SMS")}}</option>
                                            <option value="onsite" @if(isset($row['via']) && $row['via'] == 'onsite') selected @endif>{{__("Onsite")}}</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong>{{ __('Announcement content')}}</strong></div>
                            <div class="panel-body">
                                @csrf
                                @include('Announcement::admin/form',['row'=>$row])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong>{{__('Publish')}}</strong></div>
                            <div class="panel-body">
                                <div class="text-center">
                                    <!-- <button class="btn btn-primary text-right" type="submit"><i class="fa fa-save"></i> {{__('Save for future')}}</button> -->
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-share"></i> {{__('Send')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Users")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">
                                        {{__("Select users or roles")}} <span class="text-danger">*</span>
                                    </label>
                                    <select name="user_type" class="form-control" id="user_type" required>
                                        <option value="">{{ __('-- Select --')}}</option>
                                        <option value="user" @if(isset($row['user_type']) and $row['user_type'] == 'user') selected @endif>{{__("User")}}</option>
                                        <option value="role" @if(isset($row['user_type']) and $row['user_type'] == 'role') selected @endif>{{__("Role")}}</option>
                                    </select>
                                </div>

                                <!-- Role Section -->
                                <div class="form-group" id="role-section" style="display: none;">
                                    <label>{{__('Role')}}</label>
                                    <select class="form-control" name="role_id">
                                        <option value="">{{ __('-- Select --')}}</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if(old('role_id',$row->role_id) == $role->id) selected @elseif(old('role_id')  == $role->id ) selected @elseif(request()->input("user_type")  == strtolower($role->name) ) selected @endif >{{ucfirst($role->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Only For User Section -->
                                <div class="form-group" id="user-section" style="display: none;">
                                    <label>{{__("Only For User")}}</label>
                                    <?php
                                    \App\Helpers\AdminForm::select2('only_for_user[]', [
                                        'configs' => [
                                            'ajax'        => [
                                                'url'      => route("user.admin.getForSelect2"),
                                                'dataType' => 'json'
                                            ],
                                            'allowClear'  => true,
                                            'multiple'    => true,
                                            'placeholder' => __('-- Select User --'),
                                            'pre_selected' => route('user.admin.getForSelect2', [
                                                'type'         => 'space',
                                                'pre_selected' => 1
                                            ])
                                        ]
                                    ], $row->getUsersToArray() , true)
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel" id="image-section">
                            <div class="panel-title"><strong>{{__('Upload Image')}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const userTypeSelect = document.getElementById('user_type');
        const roleSection = document.getElementById('role-section');
        const userSection = document.getElementById('user-section');

        const ckEditor = document.getElementById('ckeditor');
        const textArea = document.getElementById('textarea');

        const announcementTypeSelect = document.getElementById('announcement_type');
        const titleSection = document.getElementById('title-section');
        const imageSection = document.getElementById('image-section');

        
        $('.select2').select2({
            placeholder: "-- Select Type --",
            allowClear: true
        }); 

        // Function to initialize Select2
        function initializeSelect2(selector) {
            $(selector).select2({
                allowClear: true,
                placeholder: "-- Select User --",
                ajax: {
                    url: "{{route('user.admin.getForSelect2')}}",
                    dataType: "json"
                }
            });
        }

        function toggleSections() {
            const value = userTypeSelect.value;
            if (value === "user") {
                userSection.style.display = "block";
                roleSection.style.display = "none";

                // Initialize Select2 for user section
                initializeSelect2('select[name="only_for_user[]"]');
            } else if (value === "role") {
                roleSection.style.display = "block";
                userSection.style.display = "none";
            } else {
                userSection.style.display = "none";
                roleSection.style.display = "none";
            }
        }

        function toggleContentSections() {
            const value = announcementTypeSelect.value;
            if (value === "onsite" || value === "sms") {
                titleSection.style.display = "none";
                imageSection.style.display = "none";
            } else {
                titleSection.style.display = "block";
                imageSection.style.display = "block";
            }

            if (value === "sms") {
                document.getElementById('ckeditor').style.display = 'none'; // Hide CKEditor
                document.getElementById('textarea').style.display = 'block'; // Show Textarea
            } else {
                document.getElementById('ckeditor').style.display = 'block'; // Show CKEditor
                document.getElementById('textarea').style.display = 'none'; // Hide Textarea
            }
        }

        // Initialize the visibility based on the current selection
        toggleSections();
        toggleContentSections();

        // Add event listener for changes in the select dropdown
        userTypeSelect.addEventListener('change', toggleSections);
        announcementTypeSelect.addEventListener('change', toggleContentSections);
    });
</script>

@endpush ()
