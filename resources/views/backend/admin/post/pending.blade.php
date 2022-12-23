@extends('backend.admin.layouts.master')
@section('my_title', '| Pending')
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
                <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Pending Post</h1>
                <!--end::Heading-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('admin.dashboard')}}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Categlog</li>
                    <li class="breadcrumb-item text-dark">Pending</li>
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
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Tables Widget 13-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">All Pending Post</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="min-w-150px rounded-start">Title</th>
                                    <th class="min-w-80px">Category</th>
                                    <th class="min-w-80px">Date</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Publish</th>
                                    <th class="min-w-100px">Message</th>
                                    <th class="min-w-80px text-end rounded-end">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @forelse ($posts as $key=>$post)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px me-5">
                                                    @if ($post->image)
                                                        <img src="{{asset($post->image)}}"/>
                                                    @else
                                                        <img src="{{asset('storage/posts/Noimage.jpg')}}"/>
                                                    @endif
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Name-->
                                                <div class="d-flex justify-content-start flex-column">
                                                    <p class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{!! (Str::limit($post->title,15)) !!}</p>
                                                    <p class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                    <span class="text-dark">Author</span>: {{$post->created_by}}</p>
                                                </div>
                                                <!--end::Name-->
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-light-info">{{$post->category->name}}</span>
                                        </td>
                                        <td>
                                            <p class="text-dark fw-bolder d-block mb-1 fs-6">{{$post->created_at->format('Y-m-d')}}</p>
                                        </td>
                                        <td>
                                            @if($post->status==0)
                                                <span class="badge badge-light-danger">Pending</span>
                                            @else
                                                <span class="badge badge-light-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('accept.reject',[$post->id])}}" method="post">@csrf
                                                {{method_field('PATCH')}}
                                                <input name="status" type="checkbox" value="1" checked style="display:none;">
                                                <input name="approved_by" type="text" required="" value="{{auth()->user()->name}}" hidden readonly>
                                                <button type="submit" class="btn btn-light-success btn-sm rounded-pill">
                                                    <i class="fa fa-upload" aria-hidden="true"></i>Publish
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-light-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#send_message{{$post->id}}">
                                                <i class="fa fa-paper-plane"></i> Send
                                            </button>
                                        </td>
                                        <!--begin::Modal --->
                                        <div class="modal fade" id="send_message{{$post->id}}" tabindex="-1" aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header" id="kt_modal_create_api_key_header">
                                                        <!--begin::Modal title-->
                                                        <h2>Send Message as a notification</h2>
                                                        <!--end::Modal title-->
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
                                                    <!--end::Modal header-->
                                                    <!--begin::Form-->
                                                    <form id="kt_modal_create_api_key_form" class="form"action="{{route('pending.message',[$post->id])}}" method="post">@csrf
                                                        <!--begin::Modal body-->
                                                        <div class="modal-body py-10 px-lg-17">
                                                            <!--begin::Scroll-->
                                                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                                                                <!--begin::Notice-->
                                                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex flex-stack flex-grow-1">
                                                                        <!--begin::Content-->
                                                                        <div class="fw-bold">
                                                                            <p><strong>Title: </strong>{{$post->title}}</p>
                                                                            <p><strong>Created at: </strong>{{$post->created_at->format('Y-m-d')}}</p>
                                                                            <p><strong>Author: </strong>{{$post->created_by}}</p>
                                                                        </div>
                                                                        <!--end::Content-->
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </div>
                                                                <!--end::Notice-->
                                                                <!--begin::Input group-->
                                                                <div class="d-flex flex-column mb-5 fv-row">
                                                                    <!--begin::Label-->
                                                                    <label class="required fs-5 fw-bold mb-2">Message</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <textarea class="form-control form-control-solid" rows="7" name="postmessage" placeholder="Notice">"{{$post->title}}" is rejected, Please delete this post (otherwise it will be deleted by the admin) and don't copy from any website. Must write your own content. (This notification will be deleted automatically within 7days.) You may write your post in other word software then copy in the post area.</textarea>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <!--end::Input group-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                        </div>
                                                        <!--end::Modal body-->
                                                        <!--begin::Modal footer-->
                                                        <div class="modal-footer flex-center">
                                                            <!--begin::Button-->
                                                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Discard</button>
                                                            <!--end::Button-->
                                                            <!--begin::Button-->
                                                            <button type="submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
                                                                <span class="indicator-label">Submit</span>
                                                                <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
                                                        <!--end::Modal footer-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>
                                        <!--end::Modal-->
                                        <td class="text-end">
                                            <a href="{{route('posts.show',[$post->id,$post->slug])}}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="show">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                                        <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_post{{$post->id}}">
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
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('posts.destroy',[$post->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                        </div>
                                                        <div class="modal-body">

                                                        Do you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--Modal end-->
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 13-->
            <!--begin::Tables Widget 10-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">All messages</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="min-w-150px rounded-start">Title</th>
                                    <th class="min-w-80px">Send To</th>
                                    <th class="min-w-80px text-end rounded-end">Date</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            @php
                                use App\Models\Post;
                                use Carbon\Carbon;
                                $deleteMessage = Post::where('postmessage','!=',null)->where('updated_at', '<', Carbon::now()->subDays(7))->get();
                                foreach ($deleteMessage as $oldmessage) {
                                    $oldmessage->delete();
                                }
                                $postmessages = DB::table('posts')->where('postmessage','!=',null)->where('status',0)->latest()->limit(3)->get();
                            @endphp
                            <tbody>
                                @forelse ($postmessages as $key=>$post)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Name-->
                                                <div class="d-flex justify-content-start flex-column">
                                                    <p class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{!! (Str::limit($post->title,30)) !!}</p>
                                                    <p class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">
                                                    <span class="text-dark">Author</span>: {{$post->created_by}}</p>
                                                </div>
                                                <!--end::Name-->
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="text-dark fw-bolder d-block mb-1 fs-6">{{$post->created_by}}</span>
                                        </td>
                                        <td class="text-end">
                                            <p class="text-dark fw-bolder d-block mb-1 fs-6">{{\Carbon\Carbon::parse($post->updated_at)->format('Y-m-d')}}</p>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 10-->
        </div>
        <!--end::Container-->
    </div>
@endsection
