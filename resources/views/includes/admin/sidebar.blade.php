<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class=nav-link><a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <a href="{{'pages.admin.dashboard'}}"></a>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('post.index')}}">List Post</a></li>
                    <li><a class="nav-link" href="{{route('post.tampil_hapus')}}">Posting Terhapus</a></li>
                </ul>
            </li>
            <li class=nav-link><a class="nav-link" href="{{route('category.index')}}"><i
                        class="far fa-window-maximize"></i>
                    <span>Category</span></a></li>
            <li class=nav-link><a class="nav-link" href="{{route('tag.index')}}"><i class="fas fa-tags"></i>
                    <span>Tag</span></a></li>

        </ul>
    </aside>
</div>