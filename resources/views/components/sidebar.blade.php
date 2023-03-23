<nav class="p-3">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
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
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 {{ ($expanded)? "" : "collapsed" }}" data-bs-toggle="collapse" data-bs-target="#setting-management-collapse" aria-expanded="{{ ($expanded)? "true" : "false" }}">
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
    </ul>
</nav>
