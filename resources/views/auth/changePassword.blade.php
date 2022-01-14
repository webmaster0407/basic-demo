
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Profile Change Password-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
      
                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{session('s_name')}}</p>

                            </div>
                        </div>
                        <!--end::User-->
                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Email:</span>
                                <p class="text-muted text-hover-primary">{{session('s_email')}}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Created At:</span>
                                <span class="text-muted">{{session('s_created_at')}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Updated At:</span>
                                <span class="text-muted">{{session('s_updated_at')}}</span>
                            </div>
                        </div>
                        <!--end::Contact-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
                        </div>
                        <div class="card-toolbar">
                            <button type="button" id = "changePassword" class="btn btn-success mr-2">Save Changes</button>
                            <button type="button" id = "resetBtn" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form class="form">
                        @csrf
                        <div class="card-body">
                            <!--begin::Alert-->
                            <div class="alert alert-custom alert-light-danger fade show mb-10" id="changePasswordError" role="alert" style="display:none;">
                                <div class="alert-icon">
 
                                </div>
                                <div class="alert-text font-weight-bold" id="changePasswordErrorTxt">Configure user passwords to expire periodically. Users will need warning that their passwords are going to expire,
                                <br />or they might inadvertently get locked out of the system!</div>
                            </div>
                            <!--end::Alert-->
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="oldPwd" type="password" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Current password" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="newPwd" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="New password" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify Password</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="verifyPwd" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Verify password" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Change Password-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->