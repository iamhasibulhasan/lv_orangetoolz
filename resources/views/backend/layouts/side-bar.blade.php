<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @if(Auth::user()->status == 1)
                    <li>
                        <a href="{{route('index.users')}}"><i class="fe fe-users"></i> <span>Users</span></a>
                    </li>
                @endif
                @if(Auth::user()->status == 2)
                    <li>
                        <a href="{{route('all.files')}}"><i class="fe fe-document"></i> <span>All Files</span></a>
                    </li>
                    <li>
                        <a href="{{route('upload.file')}}"><i class="fe fe-file"></i> <span>Upload File</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
