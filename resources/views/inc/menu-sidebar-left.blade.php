<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-toggle" data-toggle-class="sidebar-left-collapsed" data-target="html"
            data-fire-event="sidebar-left-toggle">
            <i class="appear-animation bounceIn appear-animation-visible fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <br>
                <div class="sidebar-widget">
                    <div class="widget-content">
                        <center>
                            <figure class="profile-picture">
                                <img src="{{URL::to('/')}}/upload/user/{{Auth::user()->image}}" class="img-thumbnail"
                                    style="border-radius: 100%;" width="150">
                            </figure>
                            <div class="profile-info">
                                <strong class="name">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</strong><br>
                                <span class="role">{{Auth::user()->position}}</span>
                            </div>
                            {{-- <hr> --}}
                        </center>
                    </div>
                </div>

                <hr class="separator" />

                <ul class="nav nav-main">

                    <li class="{{ Request::is('/') ? 'active' : ''}}">
                        <a href="{{URL::to('/')}}">
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-home"
                                aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    <li
                        class="nav-parent {{ Request::is('Machine/registration') || Request::is('Equipment/registration') || Request::is('Spare_Parts/registration') || Request::is('User')? 'nav-expanded' : ''}}">
                        <a>
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-list-alt"
                                aria-hidden="true"></i>
                            <span>Registration</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{ Request::is('Machine/registration') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/Machine/registration">
                                    Machine Registration
                                </a>
                            </li>
                            <li class="{{ Request::is('Equipment/registration') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/Equipment/registration">
                                    Equipment Registration
                                </a>
                            </li>
                            <li class="{{ Request::is('Spare_Parts/registration') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/Spare_Parts/registration">
                                    Spare Part Registration
                                </a>
                            </li>
                            <li class="{{ Request::is('User') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/User">
                                    User Registration
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-parent {{ Request::is('Machine') || Request::is('Equipment') || Request::is('Spare_Parts')? 'nav-expanded' : ''}}">
                        <a>
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-database"
                                aria-hidden="true"></i>
                            <span>Master List</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{ Request::is('Machine') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/Machine">
                                    Machine List
                                </a>
                            </li>
                            <li class="{{ Request::is('Equipment') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/Equipment">
                                    Equipment List
                                </a>
                            </li>
                            <li class="{{ Request::is('Spare_Parts') ? 'active' : ''}}">
                                <a href="{{URL('/')}}/Spare_Parts">
                                    Spare Part List
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-parent">
                        <a>
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-legal"
                                aria-hidden="true"></i>
                            <span>Machine Maintenance</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="forms-basic.html">
                                    Machine Maintenance Schedule
                                </a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">
                                    Machine Maintenance Record
                                </a>
                            </li>
                            <li>
                                <a href="forms-validation.html">
                                    Machine Lubrication Record
                                </a>
                            </li>
                            <li>
                                <a href="forms-layouts.html">
                                    Machine Maintenance Cost Record
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="mailbox-folder.html">
                            <span class="pull-right label label-primary">182</span>
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-wrench"
                                aria-hidden="true"></i>
                            <span>Maintenance Action List</span>
                        </a>
                    </li>


                    <li class="nav-parent">
                        <a>
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-warning"
                                aria-hidden="true"></i>
                            <span>Trouble</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="forms-basic.html">
                                    Trouble Report
                                </a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">
                                    Trouble and Corrective Action Report
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-parent">
                        <a>
                            <i class="appear-animation bounceIn appear-animation-visible fa fa-bar-chart-o"
                                aria-hidden="true"></i>
                            <span>Machine Data Analysis</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="forms-basic.html">
                                    Machine Breakdown
                                </a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">
                                    Machine Downtime
                                </a>
                            </li>
                            <li>
                                <a href="forms-validation.html">
                                    Machine Maintenance Cost
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>

        </div> {{-- NANO CONTENT --}}
    </div> {{-- NANO --}}

</aside>