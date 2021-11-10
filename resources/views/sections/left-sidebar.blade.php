<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ $global->logo_url }}"
             alt="AdminLTE Logo"
             class="brand-image img-fluid">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" id="sidebarnav" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon icon-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                @permission('view_jobs')
                <li class="nav-item">
                    <a href="{{ route('admin.jobs.index') }}" class="nav-link {{ request()->is('admin/jobs*') ? 'active' : '' }}">
                        <i class="nav-icon icon-badge"></i>
                        <p>
                           Pekerjaan
                        </p>
                    </a>
                </li>
                @endpermission

                @permission('view_skills')
                <li class="nav-item">
                    <a href="{{ route('admin.skills.index') }}" class="nav-link {{ request()->is('admin/skills*') ? 'active' : '' }}">
                        <i class="nav-icon icon-grid"></i>
                        <p>
                            Keahlian
                        </p>
                    </a>
                </li>
                @endpermission

                @permission('view_company')
                <li class="nav-item">
                    <a href="{{ route('admin.company.index') }}" class="nav-link {{ request()->is('admin/company*') ? 'active' : '' }}">
                        <i class="nav-icon icon-film"></i>
                        <p>
                            Perusahaan
                        </p>
                    </a>
                </li>
                @endpermission

                                @permission('view_category')
                <li class="nav-item">
                    <a href="{{ route('admin.job-categories.index') }}" class="nav-link {{ request()->is('admin/job-categories*') ? 'active' : '' }}">
                        <i class="nav-icon icon-grid"></i>
                        <p>
                           Kategori Pekerjaan
                        </p>
                    </a>
                </li>
                @endpermission

                @permission('view_locations')
                <li class="nav-item">
                    <a href="{{ route('admin.locations.index') }}" class="nav-link {{ request()->is('admin/locations*') ? 'active' : '' }}">
                        <i class="nav-icon icon-location-pin"></i>
                        <p>
                            Lokasi Pekerjaan
                        </p>
                    </a>
                </li>
                @endpermission

                @permission('view_job_applications')
                <li class="nav-item">
                    <a href="{{ route('admin.job-applications.index') }}" class="nav-link {{ request()->is('admin/job-applications*') ? 'active' : '' }}">
                        <i class="nav-icon icon-user"></i>
                        <p>
                            Manage Pelamar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.applications-archive.index') }}" class="nav-link {{ request()->is('admin/applications-archive*') ? 'active' : '' }}">
                        <i class="nav-icon icon-drawer"></i>
                        <p>
                            Data Pelamar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.job-onboard.index') }}" class="nav-link {{ request()->is('admin/job-onboard*') ? 'active' : '' }}">
                        <i class="nav-icon icon-user"></i>
                        <p>
                            Pekerjaan Tertampil
                        </p>
                    </a>
                </li>
                @endpermission

                @permission('view_schedule')
                <li class="nav-item">
                    <a href="{{ route('admin.interview-schedule.index') }}" class="nav-link {{ request()->is('admin/interview-schedule*') ? 'active' : '' }}">
                        <i class="nav-icon icon-calendar"></i>
                        <p>
                            Jadwal Interview
                        </p>
                    </a>
                </li>
                @endpermission

                @permission('view_team')
                <li class="nav-item">
                    <a href="{{ route('admin.team.index') }}" class="nav-link {{ request()->is('admin/team*') ? 'active' : '' }}">
                        <i class="nav-icon icon-people"></i>
                        <p>
                            Kelola Admin
                        </p>
                    </a>
                </li>
                @endpermission

                @if ($user->roles->count() > 0)
                    <li class="nav-item">
                        <a href="{{ route('admin.todo-items.index') }}" class="nav-link {{ request()->is('admin/todo-items*') ? 'active' : '' }}">
                            <i class="nav-icon icon-notebook"></i>
                            <p>
                                @lang('menu.todoList')
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item has-treeview @if(\Request()->is('admin/settings/*') || \Request()->is('admin/profile'))active menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon-settings"></i>
                        <p>
                            Pengaturan
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.profile.index') }}" class="nav-link {{ request()->is('admin/profile*') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        @permission('manage_settings')
                        <li class="nav-item">
                            <a href="{{ route('admin.application-setting.index') }}" class="nav-link {{ request()->is('admin/settings/application-setting') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pengaturan Aplikasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.role-permission.index') }}" class="nav-link {{ request()->is('admin/settings/role-permission') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kelola Hak Akses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.smtp-settings.index') }}" class="nav-link {{ request()->is('admin/settings/smtp-settings') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pengaturan Email</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sms-settings.index') }}" class="nav-link {{ request()->is('admin/settings/sms-settings') ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pengaturan SMS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.linkedin-settings.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pengaturan linkedIn</p>
                            </a>
                        </li>
                        @endpermission

                    </ul>
                </li>

                <li class="nav-header">Landing Page</li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link">
                        <i class="nav-icon fa fa-external-link"></i>
                        <p>Front Website</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>