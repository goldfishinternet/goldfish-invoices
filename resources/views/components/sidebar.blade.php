<nav class="p-3">
    <ul class="navbar-nav">
        @can('invoice_access')
            <li class="mb-1">
                @if(request()->is("admin/invoices*")||request()->is("admin/clients*")||request()->is("admin/client_contacts*"))
                    @php
                        $expanded = true;
                    @endphp
                @else
                    @php
                        $expanded = false;
                    @endphp
                @endif
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 {{ ($expanded)? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#invoice-management-collapse" aria-expanded="{{ ($expanded)? "true" : "false" }}">
                    {{ trans('cruds.invoiceManagement.title') }}
                </button>
                <div class="{{ ($expanded)? "expand" : "collapse" }}" id="invoice-management-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @can('invoice_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/invoices*") ? " active" : "" }}" href="{{ route("admin.invoices.index") }}">
                                    <i class="fa-fw fas fa-briefcase mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.invoice.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('client_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/clients*") ? " active" : "" }}" href="{{ route("admin.clients.index") }}">
                                    <i class="fa-fw fas fa-briefcase mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.client.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('client_contact_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/client_contacts*") ? " active" : "" }}" href="{{ route("admin.client-contacts.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.clientContact.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can(['setting_access','user_management_access'])
            <li class="mb-1">
                @if(request()->is("admin/settings*")||request()->is("admin/roles*")||request()->is("admin/permissions*")||request()->is("admin/users*")||request()->is("admin/audit-logs*")||request()->is("admin/teams*"))
                    @php
                        $expanded = true;
                    @endphp
                @else
                    @php
                        $expanded = false;
                    @endphp
                @endif
                <button class="btn btn-toggle d-flex align-items-center rounded border-0 {{ ($expanded)? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#setting-management-collapse" aria-expanded="{{ ($expanded)? "true" : "false" }}">
                    {{ trans('cruds.settingManagement.title') }}
                </button>
                <div class="{{ ($expanded)? "expand" : "collapse" }}" id="setting-management-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @can('setting_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/settings*") ? " active" : "" }}" href="{{ route("admin.settings.edit") }}">
                                    <i class="fa-fw fas fa-briefcase mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.setting.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li>
                                <a class="link-dark d-flex text-decoration-none rounded{{ request()->is("admin/roles*") ? " active" : "" }}" href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('permission_access')
                            <li>
                                <a class="link-dark d-flex text-decoration-none rounded{{ request()->is("admin/permissions*") ? " active" : "" }}" href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li>
                                <a class="link-dark d-flex text-decoration-none rounded{{ request()->is("admin/users*") ? " active" : "" }}" href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        {{--
                        @can('audit_log_access')
                            <li>
                                <a class="link-dark d-flex text-decoration-none rounded{{ request()->is("admin/audit-logs*") ? " active" : "" }}" href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li>
                                <a class="link-dark d-flex text-decoration-none rounded{{ request()->is("admin/teams*") ? " active" : "" }}" href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.team.title') }}
                                </a>
                            </li>
                        @endcan
                        --}}
                    </ul>
                </div>
            </li>
        @endcan
        {{--
        @if(file_exists(app_path('Http/Controllers/Auth/UserTeamController.php')))
            <a class="btn btn-toggle d-flex align-items-center rounded border-0" href="{{ route("team.show") }}">
                {{ trans('global.my_team') }}
            </a>
        @endif
        --}}
        @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
            @can('auth_profile_edit')
                <a class="btn btn-toggle d-flex align-items-center rounded border-0" href="{{ route("profile.show") }}">
                    {{ trans('global.my_profile') }}
                </a>
            @endcan
        @endif
        <li class="mb-1">
            <a class="btn btn-toggle d-flex align-items-center rounded border-0" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<div class="fl">
    <p class="text-center">
        <a href="https://www.goldfishinternet.com">
            <svg width="260" height="66" viewBox="0 0 260 66" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
    <g transform="matrix(0.191058,0,0,0.191058,-82.4051,-9.55384)">
        <clipPath id="_clip1">
            <circle cx="604.044" cy="222.728" r="167.5"/>
        </clipPath>
        <g clip-path="url(#_clip1)">
            <g transform="matrix(0.24,0,0,0.24,9,0)">
                <circle cx="2482.6" cy="928.031" r="697.917" style="fill:rgb(242,94,13);"/>
            </g>
            <g transform="matrix(0.805781,0,0,0.805781,81.8085,85.0086)">
                <path d="M797.606,145.162C801.413,123.31 732.184,43.325 684.456,16.475L678.511,18.371C698.833,76.567 673.14,146.55 608.712,191.762C538.07,241.761 444.13,245.339 382.746,204.811C387.456,262.934 408.557,327.639 446.608,376.173C446.608,376.173 334.777,384.125 260.37,367.234C203.995,354.419 87.343,320.08 0,254.625C0,254.625 143.732,393.44 297.62,428.266C451.512,463.093 551.396,460.407 655.649,388.105C758.207,317.058 817.467,211.683 802.286,195.524C787.108,179.34 740.813,190.111 716.755,181.616C716.755,181.616 793.774,167.013 797.606,145.162Z" style="fill:white;fill-rule:nonzero;"/>
            </g>
            <g transform="matrix(0.805781,0,0,0.805781,81.8085,85.0086)">
                <path d="M469.681,163.37C453.354,118.197 472.501,69.466 512.503,54.49C552.545,39.685 598.188,64.289 614.735,109.433C631.075,154.814 611.942,203.542 571.929,218.339C531.905,233.32 486.239,208.698 469.681,163.37Z" style="fill:white;"/>
            </g>
            <g transform="matrix(0.805781,0,0,0.805781,81.8085,85.0086)">
                <path d="M588.973,124.86L554.789,152.656L568.243,106.61C555.897,100.26 541.726,98.739 528.446,103.648C501.552,113.705 488.619,146.561 499.563,177.133C510.694,207.405 541.604,223.919 568.706,214.077C595.603,204.02 608.535,171.173 597.593,140.598C595.468,134.776 592.403,129.608 588.973,124.86Z" style="fill:rgb(39,28,8);fill-rule:nonzero;"/>
            </g>
        </g>
    </g>
    <g transform="matrix(0.145658,0,0,0.145658,40.8702,3.53053)">
        <g transform="matrix(118.591,0,0,118.591,1429.52,314.82)">
        </g>
        <text x="277.876px" y="314.82px" style="font-family:'Raleway-BoldItalic', 'Raleway';font-weight:700;font-style:italic;font-size:118.591px;">w<tspan x="366.938px 428.724px 497.745px 522.174px 575.303px 640.291px 679.545px 719.985px 809.165px 879.609px 920.286px 982.072px 1006.5px 1058.44px 1115.84px 1168.73px 1208.58px 1270.37px 1372.59px " y="314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px ">eb software systems</tspan></text>
    </g>
    <g transform="matrix(0.154482,0,0,0.154482,24.4386,-17.8437)">
        <g transform="matrix(165.676,0,0,165.676,630.931,314.82)">
        </g>
        <g transform="matrix(165.676,0,0,165.676,685.232,314.82)">
        </g>
        <g transform="matrix(165.676,0,0,165.676,1510.34,314.82)">
        </g>
        <text x="277.876px" y="314.82px" style="font-family:'Raleway-ExtraBold', 'Raleway';font-weight:800;font-size:165.676px;">G<tspan x="390.867px 483.645px 530.863px 630.931px 720.893px 794.95px 888.059px 918.378px 959.797px 1052.74px 1110.07px 1201.85px 1259.84px 1352.94px 1443.74px " y="314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px 314.82px ">oldﬁsh Internet</tspan></text>
    </g>
</svg>
        </a>
    </p>
    <p class="text-center text-dark"><a href="https://www.goldfishinternet.com">www.goldfishinternet.com</a></p>
</div>
