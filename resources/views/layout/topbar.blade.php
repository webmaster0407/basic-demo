<!--begin::Topbar-->
<div class="topbar">
    <!--begin::Quick Actions-->
    <div class="dropdown">
        <!--begin::Toggle-->
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                <span class="svg-icon svg-icon-xl svg-icon-primary">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
        </div>
        <!--end::Toggle-->
        <!--begin::Dropdown-->
        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
            <!--begin:Header-->
            <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top">
                <h4 class="text-success font-weight-bold">{{session('username')}}</h4>	
            </div>
            <!--end:Header-->
            <!--begin:Nav-->
            <div class="row row-paddingless">
                <!--begin:Item-->
                <div class="col-6" id="changePwd">
                    <div  href="" data-toggle="modal" data-target="#darkModalForm" class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
                        <span class="svg-icon svg-icon-3x svg-icon-success">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
                            <svg enable-background="new 0 0 500 500" height="500px" id="Layer_1" version="1.1" viewBox="0 0 500 500" width="500px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M56.629,379.2c-14.09,14.071-14.09,36.975,0,51.055  c14.08,14.087,36.981,14.087,50.965,0l10.177-10.08l42.438,42.428c7.257,7.268,18.888,7.268,26.155,0l63.244-63.244  c7.268-7.255,7.268-18.89,0-26.157l-42.429-42.427l75.586-75.682c16.174,8.357,34.61,13.075,54.059,13.075  c65.234,0,118.111-52.869,118.111-118.109c0-65.232-52.877-118.111-118.111-118.111c-65.238,0-118.11,52.879-118.11,118.111  c0,19.449,4.721,37.886,13.077,54.06L56.629,379.2z M291.396,150.059c0-25.075,20.354-45.429,45.427-45.429  c25.076,0,45.426,20.354,45.426,45.429s-20.35,45.426-45.426,45.426C311.751,195.485,291.396,175.133,291.396,150.059z" fill="#029ef7" fill-rule="evenodd"/></svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span  class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Change Password</span>
                    </div>
                </div>
                <!--end:Item-->
                <!--begin:Item-->
                <div class="col-6" id="logOut">
                    <div class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
                        <span  class="svg-icon svg-icon-3x svg-icon-success">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg-->
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" fill="#029ef7" fill-rule="evenodd">
                            <g>
                                <path d="M332.8,153.6v-51.2c0-42.4-34.4-76.8-76.8-76.8H76.8C34.4,25.6,0,60,0,102.4v307.2c0,42.4,34.4,76.8,76.8,76.8H256
                                    c42.4,0,76.8-34.4,76.8-76.8v-51.2c0-14.1-11.5-25.6-25.6-25.6s-25.6,11.5-25.6,25.6v51.2c0,14.1-11.5,25.6-25.6,25.6H76.8
                                    c-14.1,0-25.6-11.5-25.6-25.6V102.4c0-14.1,11.5-25.6,25.6-25.6H256c14.1,0,25.6,11.5,25.6,25.6v51.2c0,14.1,11.5,25.6,25.6,25.6
                                    S332.8,167.7,332.8,153.6z"/>
                                <path d="M128,281.6h358.4c10.4,0,19.7-6.2,23.7-15.8c4-9.6,1.8-20.6-5.5-27.9l-76.8-76.8c-10-10-26.2-10-36.2,0
                                    c-10,10-10,26.2,0,36.2l33.1,33.1l-296.6,0c-14.1,0-25.6,11.5-25.6,25.6C102.4,270.1,113.9,281.6,128,281.6L128,281.6z
                                    M427.7,350.9l76.8-76.8c10-10,10-26.2,0-36.2s-26.2-10-36.2,0l-76.8,76.8c-10,10-10,26.2,0,36.2
                                    C401.5,360.9,417.7,360.9,427.7,350.9z"/>
                            </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span  class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Logout?</span>
                    </div>
                </div>
                <!--end:Item-->
            </div>
            <!--end:Nav-->
        </div>
        <!--end::Dropdown-->
    </div>
    <!--end::Quick Actions-->
    <!--begin::User-->
    <div class="topbar-item">
        <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
            <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
            <span id="s_username" class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ session('username')}}</span>! &nbsp;
            <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                <span class="symbol-label font-size-h5 font-weight-bold">S</span>
            </span>
        </div>
    </div>
    <!--end::User-->
</div>
<!--end::Topbar-->