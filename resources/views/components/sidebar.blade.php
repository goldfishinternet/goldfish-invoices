<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/roles*")||request()->is("admin/permissions*")||request()->is("admin/users*")||request()->is("admin/audit-logs*")||request()->is("admin/teams*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/teams*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.teams.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-users">
                                        </i>
                                        {{ trans('cruds.team.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                            </i>
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/product-categories*")||request()->is("admin/product-tags*")||request()->is("admin/products*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-shopping-cart">
                            </i>
                            {{ trans('cruds.productManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('product_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/product-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.product-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.productCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('product_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/product-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.product-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.productTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/products*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.products.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-shopping-cart">
                                        </i>
                                        {{ trans('cruds.product.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('content_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/content-categories*")||request()->is("admin/content-tags*")||request()->is("admin/content-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-book">
                            </i>
                            {{ trans('cruds.contentManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('content_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.contentCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-tags">
                                        </i>
                                        {{ trans('cruds.contentTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('content_page_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/content-pages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.content-pages.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file">
                                        </i>
                                        {{ trans('cruds.contentPage.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('system_calendar_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.system-calendars.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-calendar">
                            </i>
                            {{ trans('cruds.systemCalendar.title') }}
                        </a>
                    </li>
                @endcan
                @can('basic_c_r_m_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/crm-statuses*")||request()->is("admin/crm-customers*")||request()->is("admin/crm-notes*")||request()->is("admin/crm-documents*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-briefcase">
                            </i>
                            {{ trans('cruds.basicCRM.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('crm_status_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/crm-statuses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.crm-statuses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.crmStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('crm_customer_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/crm-customers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.crm-customers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-plus">
                                        </i>
                                        {{ trans('cruds.crmCustomer.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('crm_note_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/crm-notes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.crm-notes.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-sticky-note">
                                        </i>
                                        {{ trans('cruds.crmNote.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('crm_document_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/crm-documents*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.crm-documents.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-folder">
                                        </i>
                                        {{ trans('cruds.crmDocument.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/task-statuses*")||request()->is("admin/task-tags*")||request()->is("admin/tasks*")||request()->is("admin/task-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-list">
                            </i>
                            {{ trans('cruds.taskManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('task_status_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-statuses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-statuses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-server">
                                        </i>
                                        {{ trans('cruds.taskStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-server">
                                        </i>
                                        {{ trans('cruds.taskTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tasks*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tasks.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.task.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_calendar_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-calendars.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-calendar">
                                        </i>
                                        {{ trans('cruds.taskCalendar.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('faq_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/faq-categories*")||request()->is("admin/faq-questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-question">
                            </i>
                            {{ trans('cruds.faqManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('faq_category_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/faq-categories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.faq-categories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.faqCategory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/faq-questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.faq-questions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-question">
                                        </i>
                                        {{ trans('cruds.faqQuestion.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contact_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/contact-companies*")||request()->is("admin/contact-contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-phone-square">
                            </i>
                            {{ trans('cruds.contactManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('contact_company_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-companies*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-companies.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-building">
                                        </i>
                                        {{ trans('cruds.contactCompany.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('contact_contact_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-contacts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-plus">
                                        </i>
                                        {{ trans('cruds.contactContact.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('course_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/courses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.courses.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.course.title') }}
                        </a>
                    </li>
                @endcan
                @can('lesson_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/lessons*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.lessons.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.lesson.title') }}
                        </a>
                    </li>
                @endcan
                @can('test_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/tests*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tests.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.test.title') }}
                        </a>
                    </li>
                @endcan
                @can('question_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/questions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.questions.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.question.title') }}
                        </a>
                    </li>
                @endcan
                @can('question_option_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/question-options*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.question-options.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.questionOption.title') }}
                        </a>
                    </li>
                @endcan
                @can('test_result_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/test-results*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.test-results.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.testResult.title') }}
                        </a>
                    </li>
                @endcan
                @can('test_answer_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/test-answers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.test-answers.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                            </i>
                            {{ trans('cruds.testAnswer.title') }}
                        </a>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>

                @if(file_exists(app_path('Http/Controllers/Auth/UserTeamController.php')))
                    <li class="items-center">
                        <a href="{{ route("team.show") }}" class="{{ request()->is("team") ? "sidebar-nav-active" : "sidebar-nav" }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user-friends"></i>
                            {{ trans('global.my_team') }}
                        </a>
                    </li>
                @endif


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>