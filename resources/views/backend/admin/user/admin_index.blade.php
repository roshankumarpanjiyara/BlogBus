@extends('backend.admin.layouts.master')
@section('my_title', '| Admin')
@section('content')
<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" class="header">
        <!--begin::Container-->
        <div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <!--begin::Heading-->
                <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Admin</h1>
                <!--end::Heading-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Admin</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title=-->
            <!--begin::Wrapper-->
            <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                <!--begin::Aside mobile toggle-->
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside mobile toggle-->
                <!--begin::Logo-->
                <a href="{{route('admin.dashboard')}}" class="d-flex align-items-center">
                    <img alt="Logo" src="{{asset("logos/img/blogbus-logo-1.png")}}" class="h-30px" />
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Tables Widget 9-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Admin</span>
                </h3>
                @if(isset(auth()->user()->role->permission['name']['user']['can-view']))
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a admin">
                        <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#create_admin">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Create Admin</a>
                    </div>
                @endif
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-striped table-row-bordered rounded table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-50px">SN</th>
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-100px">Role</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($admins as $key=>$admin)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <p class="text-dark fw-bolder fs-6">{{$key+1}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-5">
                                                @if ($admin->profile_photo_path)
                                                    <img src="{{asset(Auth::user()->profile_photo_path) }}" alt="{{ $admin->name }}" />
                                                @else
                                                    <img src="{{ $admin->profile_photo_url }}" alt="{{ $admin->name }}" />
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <p class="text-dark fw-bolder text-hover-primary fs-6">{{$admin->name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-dark fw-bolder text-hover-primary fs-6">{{$admin->email}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-dark fw-bolder text-hover-primary fs-6"><span class="badge badge-success">{{$admin->role->name??''  }}</span></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit_admin{{$admin->id}}">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Modal - Edit role-->
                                            <!--begin::Modal - New Target-->
                                            <div class="modal fade" id="edit_admin{{$admin->id}}" tabindex="-1" aria-hidden="true">
                                                <!--begin::Modal dialog-->
                                                <div class="modal-dialog modal-dialog-centered mw-950px">
                                                    <!--begin::Modal content-->
                                                    <div class="modal-content rounded">
                                                        <!--begin::Modal header-->
                                                        <div class="modal-header pb-0 border-0 justify-content-end">
                                                            <!--begin::Close-->
                                                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <!--begin::Modal header-->
                                                        <!--begin::Modal body-->
                                                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                            <!--begin:Form-->
                                                            <form id="kt_modal_new_target_form" class="form" action="{{route('admins.update',[$admin->id])}}" method="post" enctype="multipart/form-data">@csrf
                                                                {{method_field('PATCH')}}
                                                                <!--begin::Heading-->
                                                                <div class="mb-13 text-center">
                                                                    <!--begin::Title-->
                                                                    <h1 class="mb-3">Update</h1>
                                                                    <!--end::Title-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <div class="row g-9 mb-8">
                                                                    <div class="col-md-8 fv-row">
                                                                        <div class="mb-3">
                                                                            <!--begin::Title-->
                                                                            <h3 class="mb-3">General Information</h3>
                                                                            <!--end::Title-->
                                                                        </div>
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span class="required">Name</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Name" name="name" value="{{$admin->name}}" autocomplete="off"/>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span class="required">Username</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Username" name="username" readonly value="{{$admin->username}}" autocomplete="off"/>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span>Mobile Number</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Mobile Number" name="mobile_number" value="{{$admin->mobile_number}}" autocomplete="off"/>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span>Designation</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Designation" name="designation" value="{{$admin->designation}}" autocomplete="off"/>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span>Experience/Bio</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <textarea class="form-control form-control-solid" rows="3" name="experience" placeholder="Type Your Experience/Bio">{{$admin->experience}}</textarea>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8">

                                                                        </div>
                                                                        <!--end::Input group-->
                                                                    </div>
                                                                    <div class="col-md-4 fv-row">
                                                                        <div class="mb-3">
                                                                            <!--begin::Title-->
                                                                            <h3 class="mb-3">Login Information</h3>
                                                                            <!--end::Title-->
                                                                        </div>
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span class="required">Email</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Email" name="email" value="{{$admin->email}}" readonly autocomplete="off"/>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <!--begin::Label-->
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span class="required">Password</span>
                                                                            </label>
                                                                            <!--end::Label-->
                                                                            <input type="password" class="form-control form-control-solid" placeholder="Enter Password" name="password" autocomplete="off"/>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                                            <label class="required fs-6 fw-bold mb-2">Assign Role</label>
                                                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Role" name="role_id">
                                                                                    <option value="">Select user...</option>
                                                                                    @foreach(App\Models\Role::all() as $role)
                                                                                        <option value="{{$role->id}}"@if($admin->role_id==$role->id)selected @endif>{{$role->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Input group-->
                                                                        <div class="d-flex flex-column mb-8 fv-row">

                                                                        </div>
                                                                        <!--end::Input group-->
                                                                        <!--begin::Actions-->
                                                                        @if(isset(auth()->user()->role->permission['name']['user']['can-view']))
                                                                            <div class="text-center">
                                                                                <button type="reset" id="edit_user{{$admin->id}}_cancel"  data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                                                                <button type="submit" id="edit_user{{$admin->id}}_submit" class="btn btn-primary">
                                                                                    <span class="indicator-label">Update</span>
                                                                                    <span class="indicator-progress">Please wait...
                                                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                                </button>
                                                                            </div>
                                                                        @endif
                                                                        <!--end::Actions-->
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!--end:Form-->
                                                        </div>
                                                        <!--end::Modal body-->
                                                    </div>
                                                    <!--end::Modal content-->
                                                </div>
                                                <!--end::Modal dialog-->
                                            </div>
                                            <!--end::Modal - New Target-->
                                            <!--end::Modal - Edit role-->
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_user{{$admin->id}}">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete_user{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('admins.delete',[$admin->id])}}" method="post">@csrf
                                                        {{method_field('DELETE')}}
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--Modal end-->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 9-->
        <!--begin::Modal - New Target-->
        <div class="modal fade" id="create_admin" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-950px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <!--begin:Form-->
                        <form id="create_user_form" class="form" action="{{route('admins.store')}}" method="post" enctype="multipart/form-data">@csrf
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">Create</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <div class="row g-9 mb-8">
                                <div class="col-md-8 fv-row">
                                    <div class="mb-3">
                                        <!--begin::Title-->
                                        <h3 class="mb-3">General Information</h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Name</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter Name" name="name" autocomplete="off"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Username</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid @error('username') is-invalid @enderror" placeholder="Enter Username" name="username" autocomplete="off"/>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Mobile Number</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Mobile Number" name="mobile_number" autocomplete="off"/>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Designation</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Designation" name="designation" autocomplete="off"/>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span>Experience/Bio</span>
                                        </label>
                                        <!--end::Label-->
                                        <textarea class="form-control form-control-solid" rows="3" name="experience" placeholder="Type Your Experience/Bio"></textarea>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8">

                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col-md-4 fv-row">
                                    <div class="mb-3">
                                        <!--begin::Title-->
                                        <h3 class="mb-3">Login Information</h3>
                                        <!--end::Title-->
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Email</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" autocomplete="off"/>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Password</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="password" class="form-control form-control-solid @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" autocomplete="off"/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">Assign Role</label>
                                        <select class="form-select form-select-solid @error('role_id') is-invalid @enderror" data-control="select2" data-hide-search="true" data-placeholder="Select a Role" name="role_id">
                                            <option value="">Select user...</option>
                                            @foreach(App\Models\Role::all() as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    @if(isset(auth()->user()->role->permission['name']['user']['can-view']))
                                        <div class="text-center">
                                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" id="create_admin_submit" class="btn btn-primary">
                                                <span class="indicator-label">Submit</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                    @endif
                                    <!--end::Actions-->
                                </div>
                            </div>
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Target-->
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->
@endsection
