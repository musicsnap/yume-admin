@inject('menu','App\Repositories\Presenter\MenuPresenter')
{{--{!! dd($menu->sidebarMenus($slidebarMenus)) !!}--}}
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            {{--<li class="nav-item start ">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-home"></i>--}}
                    {{--<span class="title">Dashboard</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item start ">--}}
                        {{--<a href="index.html" class="nav-link ">--}}
                            {{--<i class="icon-bar-chart"></i>--}}
                            {{--<span class="title">Dashboard 1</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {!! $menu->sidebarMenus($slidebarMenus) !!}


            {{--<li class="nav-item active open">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-folder"></i>--}}
                    {{--<span class="title">Multi Level Menu</span>--}}
                    {{--<span class="arrow "></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                            {{--<i class="icon-settings"></i> Item 1--}}
                            {{--<span class="arrow"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="?p=dashboard-2" target="_blank" class="nav-link">--}}
                                    {{--<i class="icon-user"></i> Arrow Toggle--}}
                                    {{--<span class="arrow nav-toggle"></span>--}}
                                {{--</a>--}}
                                {{--<ul class="sub-menu">--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a href="#" class="nav-link">--}}
                                            {{--<i class="icon-power"></i> Sample Link 1</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a href="#" class="nav-link">--}}
                                            {{--<i class="icon-paper-plane"></i> Sample Link 1</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                        {{--<a href="#" class="nav-link">--}}
                                            {{--<i class="icon-star"></i> Sample Link 1</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="icon-camera"></i> Sample Link 1</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="icon-link"></i> Sample Link 2</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="icon-pointer"></i> Sample Link 3</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="?p=dashboard-2" target="_blank" class="nav-link">--}}
                            {{--<i class="icon-globe"></i> Arrow Toggle--}}
                            {{--<span class="arrow nav-toggle"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="icon-tag"></i> Sample Link 1</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="icon-pencil"></i> Sample Link 1</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="icon-graph"></i> Sample Link 1</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="#" class="nav-link">--}}
                            {{--<i class="icon-bar-chart"></i> Item 3 </a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </div>
</div>