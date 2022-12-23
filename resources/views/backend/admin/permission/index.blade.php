@extends('backend.admin.layouts.master')
@section('my_title', '| Permission')
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
                <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Permission</h1>
                <!--end::Heading-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Permission</li>
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
                    <span class="card-label fw-bolder fs-3 mb-1">Permission</span>
                </h3>
                @if(isset(auth()->user()->role->permission['name']['permission']['can-view']))
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add permissions">
                        <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#create_permission">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Permission</a>
                    </div>
                @endif
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class=" table table-striped table-row-bordered table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-30px">SN</th>
                                <th class="min-w-90px">Name</th>
                                <th class="min-w-150px">Role</th>
                                <th class="min-w-60px text-end">Actions</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach($permissions as $key=>$permission)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-dark fw-bolder fs-6">{{$key+1}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="text-dark fw-bolder text-hover-primary fs-6">{{$permission->role->name}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['role']['can-view']))
                                                    <span class="badge badge-light-primary fs-7">Role</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['permission']['can-view']))
                                                    <span class="badge badge-light-danger fs-7">Permission</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['user']['can-view']))
                                                    <span class="badge badge-light-success fs-7">User</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['pending']['can-view']))
                                                    <span class="badge badge-light-info fs-7">Pending</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['catelog']['can-view']))
                                                    <span class="badge badge-light-warning fs-7">Catelog</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['addons']['can-view']))
                                                    <span class="badge badge-light-dark fs-7">Addons</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['advertisement']['can-view']))
                                                    <span class="badge badge-light-dark fs-7">Advertisement</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                @if(isset($permission['name']['contact']['can-view']))
                                                    <span class="badge badge-light-success fs-7">Contact</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            @if(isset(auth()->user()->role->permission['name']['permission']['can-view']))
                                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#edit_permission{{$permission->id}}">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Modal - Edit Permission-->
                                                <div class="modal fade" id="edit_permission{{$permission->id}}" tabindex="-1" aria-hidden="true">
                                                    <!--begin::Modal dialog-->
                                                    <div class="modal-dialog mw-650px">
                                                        <!--begin::Modal content-->
                                                        <div class="modal-content">
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
                                                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                                                <!--begin::Heading-->
                                                                <div class="text-center mb-13">
                                                                    <!--begin::Title-->
                                                                    <h1 class="mb-3">Edit Permission</h1>
                                                                    <!--end::Title-->
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Separator-->
                                                                <div class="separator d-flex flex-center mb-8">
                                                                </div>
                                                                <!--end::Separator-->
                                                                <form action="{{route('permissions.update',[$permission->id])}}" method="post">@csrf
                                                                    {{method_field('PATCH')}}
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                                <span>{{$permission->role->name}}</span>
                                                                            </label>
                                                                            <table class="table table-striped mt-3">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th scope="col">Permission</th>
                                                                                    <th scope="col">can-view</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                <tr>
                                                                                    <td>Role</td>
                                                                                    <td><input type="checkbox" name="name[role][can-view]" @if(isset($permission['name']['role']['can-view']))checked @endif value="1"></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Permissions</td>
                                                                                    <td><input type="checkbox" name="name[permission][can-view]" @if(isset($permission['name']['permission']['can-view']))checked @endif value="1"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>User</td>
                                                                                    <td><input type="checkbox" name="name[user][can-view]" @if(isset($permission['name']['user']['can-view']))checked @endif value="1"></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Catelog</td>
                                                                                    <td><input type="checkbox" name="name[catelog][can-view]" @if(isset($permission['name']['catelog']['can-view']))checked @endif value="1"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Pending Post</td>
                                                                                    <td><input type="checkbox" name="name[pending][can-view]" @if(isset($permission['name']['pending']['can-view']))checked @endif value="1"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Advertisement</td>
                                                                                    <td><input type="checkbox" name="name[advertisement][can-view]" @if(isset($permission['name']['advertisement']['can-view']))checked @endif value="1"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Contact</td>
                                                                                    <td><input type="checkbox" name="name[contact][can-view]" @if(isset($permission['name']['contact']['can-view']))checked @endif value="1"></td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            @if(isset(Auth::user()->role->permission['name']['permission']['can-view']))
                                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!--end::Modal body-->
                                                        </div>
                                                        <!--end::Modal content-->
                                                    </div>
                                                    <!--end::Modal dialog-->
                                                </div>
                                                <!--end::Modal - Edit Permission-->
                                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_permission{{$permission->id}}">
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
                                                <div class="modal fade" id="delete_permission{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{route('permissions.destroy',[$permission->id])}}" method="post">@csrf
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
                                            @endif
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
        <!--begin::Modal - Create Permission-->
		<div class="modal fade" id="create_permission" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
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
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
						<!--begin::Heading-->
						<div class="text-center mb-13">
							<!--begin::Title-->
							<h1 class="mb-3">Create Permission</h1>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Separator-->
						<div class="separator d-flex flex-center mb-8">
						</div>
						<!--end::Separator-->
                        <form action="{{route('permissions.store')}}" method="post">@csrf
                            <div class="card">
                                <div class="card-body">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Assign Role</span>
                                    </label>
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Role" name="role_id">
                                        <option value="">Select user...</option>
                                        @foreach(App\Models\Role::all() as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Permission</th>
                                                <th scope="col" class="text-center">can-view</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Role</td>
                                                <td class="text-center"><input type="checkbox" name="name[role][can-view]" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>Permissions</td>
                                                <td class="text-center"><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>User</td>
                                                <td class="text-center"><input type="checkbox" name="name[user][can-view]" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>Catelog</td>
                                                <td class="text-center"><input type="checkbox" name="name[catelog][can-view]" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>Pending Post</td>
                                                <td class="text-center"><input type="checkbox" name="name[pending][can-view]" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>Advertisement</td>
                                                <td class="text-center"><input type="checkbox" name="name[advertisement][can-view]" value="1"></td>
                                            </tr>
                                            <tr>
                                                <td>Contact</td>
                                                <td class="text-center"><input type="checkbox" name="name[contact][can-view]" value="1"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @if(isset(auth()->user()->role->permission['name']['permission']['can-view']))
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    @endif
                                </div>
                            </div>
                        </form>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Create Permission-->
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->
@endsection
