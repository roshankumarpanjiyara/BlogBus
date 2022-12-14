<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container d-flex flex-column flex-md-row flex-stack">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-gray-400 fw-bold me-1">Created by</span>
            <a href="" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Roshan Kumar</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="" target="_blank" class="menu-link px-2"></a>
            </li>
            <li class="menu-item">
                <a href="" target="_blank" class="menu-link px-2"></a>
            </li>
            <li class="menu-item">
                <a href="" target="_blank" class="menu-link px-2"></a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->
@php
    use App\Models\Post;
    use Carbon\Carbon;
    $deleteMessage = Post::where('postmessage','!=',null)->where('username',auth()->user()->username)->where('updated_at', '<', Carbon::now()->subDays(7))->get();
    foreach ($deleteMessage as $oldmessage) {
        $oldmessage->delete();
    }
    $postmessages = DB::table('posts')->where('postmessage','!=',null)->where('username',auth()->user()->username)->where('status',0)->latest()->limit(3)->get();
@endphp
<!--begin::Chat drawer-->
<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
    <!--begin::Messenger-->
    <div class="card w-100 rounded-0" id="kt_drawer_chat_messenger">
        <!--begin::Card header-->
        <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
            <!--begin::Title-->
            <div class="card-title">
                <!--begin::User-->
                <div class="d-flex justify-content-center flex-column me-3">
                    <p class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Message Center</p>
                </div>
                <!--end::User-->
            </div>
            <!--end::Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body" id="kt_drawer_chat_messenger_body">
            <!--begin::Messages-->
            <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                @forelse ($postmessages as $message)
                <p class="fs-5 fw-bolder text-gray-900 me-1">Post :</p>
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    @if ($message->image)
                                        <img src="{{asset($message->image)}}"/>
                                    @else
                                        <img src="{{asset('storage/posts/Noimage.jpg')}}"/>
                                    @endif
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <span class="fs-5 fw-bolder text-gray-900 me-1">{!! (Str::limit($message->title,30)) !!}</span>
                                    <span class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($message->updated_at)->diffForHumans() }}</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{!! $message->postmessage !!}</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                @empty

                @endforelse
            </div>
            <!--end::Messages-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Messenger-->
</div>
<!--end::Chat drawer-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset("template/dist/assets/js/scripts.bundle.js")}}"></script>
<script src="{{asset("template/dist/assets/plugins/global/plugins.bundle.js")}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset("template/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js")}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset("template/dist/assets/js/custom/widgets.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/apps/chat/chat.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/modals/create-app.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/app/user-management/permissions/list.js")}}"></script>

<!--end::Page Custom Javascript-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> --}}
<script src="{{asset("template/dist/assets/plugins/custom/datatables/datatables.bundle.js")}}"></script>

<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset("template/dist/assets/js/custom/widgets.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/apps/chat/chat.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/modals/new-target.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/modals/create-app.js")}}"></script>
<script src="{{asset("template/dist/assets/js/custom/modals/upgrade-plan.js")}}"></script>
<!--end::Page Custom Javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    $("#post-table").DataTable({
        "language": {
        "lengthMenu": "Show _MENU_",
        },
        "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
    });
</script>
<script>
    CKEDITOR.replace( 'editor2' );
</script>
<script>
    window.onload= function() {
        var color = '#f39c12';
        var maxParticles = 150;
        Particles.init({
            selector: '#particles-js',
            color: color,
            maxParticles: maxParticles,
            connectParticles: true,
            speed: 0.2,

            responsive: [{
                breakpoint:768,
                options: {
                    maxParticles:150,
                    color: color,
                    connectParticles:true
                }
            }, {
                breakpoint:425,
                options: {
                    maxParticles:100,
                    connectParticles:true
                }
            }, {
                breakpoint:320,
                options: {
                    maxParticles:100,
                    connectParticles:true
                }
                }
            ]
        });
    };
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
