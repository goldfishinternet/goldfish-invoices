<nav class="flex-shrink-0 p-3">
    <a href="{{ route('admin.home') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">{{ trans('panel.site_title') }}</a></span>
    </a>
    <ul class="list-unstyled ps-0">
        @can('invoice_access')
            <li class="border-top my-3"></li>
            <li class="mb-1">
                @if(request()->is("admin/invoices*"))
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
                    </ul>
                </div>
            </li>
        @endcan

        @can('client_access')
            <li class="border-top my-3"></li>
            <li class="mb-1">
                @if(request()->is("admin/clients*")||request()->is("admin/client_contacts*"))
                    @php
                        $expanded = true;
                    @endphp
                @else
                    @php
                        $expanded = false;
                    @endphp
                @endif
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 {{ ($expanded)? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#client-management-collapse" aria-expanded="{{ ($expanded)? "true" : "false" }}">
                    {{ trans('cruds.clientManagement.title') }}
                </button>
                <div class="{{ ($expanded)? "expand" : "collapse" }}" id="client-management-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
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

        @can('user_management_access')
            <li class="border-top my-3"></li>
            <li class="mb-1">
                @if(request()->is("admin/roles*")||request()->is("admin/permissions*")||request()->is("admin/users*")||request()->is("admin/audit-logs*")||request()->is("admin/teams*"))
                    @php
                        $expanded = true;
                    @endphp
                @else
                    @php
                        $expanded = false;
                    @endphp
                @endif
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 {{ ($expanded)? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#user-management-collapse" aria-expanded="{{ ($expanded)? "true" : "false" }}">
                    {{ trans('cruds.userManagement.title') }}
                </button>
                <div class="{{ ($expanded)? "expand" : "collapse" }}" id="user-management-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @can('role_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/roles*") ? " active" : "" }}" href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('permission_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/permissions*") ? " active" : "" }}" href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/users*") ? " active" : "" }}" href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/audit-logs*") ? " active" : "" }}" href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/teams*") ? " active" : "" }}" href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users mt-1 mr-1">
                                    </i>
                                    {{ trans('cruds.team.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan

        @can('user_alert_access')
            <li class="border-top my-3"></li>
            <li class="mb-1">
                @if(request()->is("admin/user-alerts*"))
                    @php
                        $expanded = true;
                    @endphp
                @else
                    @php
                        $expanded = false;
                    @endphp
                @endif
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0  {{ $expanded ? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#user-alerts-collapse" aria-expanded="{{ $expanded ? "true" : "false" }}">
                    {{ trans('cruds.userAlert.title') }}
                </button>
                <div class="{{ ($expanded)? "expand" : "collapse" }}" id="user-alerts-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li>
                            <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("admin/user-alerts*") ? "active" : "" }}" href="{{ route("admin.user-alerts.index") }}">
                                <i class="fa-fw fas fa-bell mt-1 mr-1">
                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan

        <li class="border-top my-3"></li>
        <li class="mb-1">
            @if(request()->is("team")||request()->is("profile"))
                @php
                    $expanded = true;
                @endphp
            @else
                @php
                    $expanded = false;
                @endphp
            @endif
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 {{ $expanded ? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="{{ $expanded ? "true" : "false" }}">
                Account
            </button>
            <div class="{{ ($expanded)? "expand" : "collapse" }}" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    @if(file_exists(app_path('Http/Controllers/Auth/UserTeamController.php')))
                        <li>
                            <a href="{{ route("team.show") }}" class="{{ request()->is("team") ? " active" : "" }}">
                                <i class="fa-fw fas fa-user-friends mt-1 mr-1"></i>
                                {{ trans('global.my_team') }}
                            </a>
                        </li>
                    @endif
                    @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                        @can('auth_profile_edit')
                            <li>
                                <a class="link-dark d-inline-flex text-decoration-none rounded{{ request()->is("profile") ? " active" : "" }}" href="{{ route("profile.show") }}">
                                    <i class="fa-fw fas fa-user-circle mt-1 mr-1"></i>
                                    {{ trans('global.my_profile') }}
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li>
                        <a class="link-dark d-inline-flex text-decoration-none rounded" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <i class="fa-fw fas fa-sign-out-alt"></i>
                            {{ trans('global.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
