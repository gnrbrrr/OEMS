<header class="header">
    <div class="logo-container">
        <a href="{{URL::to('/')}}" class="logo">
            <img src="{{URL::to('/')}}/theme/assets/images/banner2.png" height="35"/>            
        </a>
        
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <span class="separator"></span>
        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="{{URL::to('/')}}/upload/user/{{Auth::user()->image}}" alt="{{Auth::user()->firstname}} {{Auth::user()->lastname}}" class="img-circle" data-lock-picture="{{URL::to('/')}}/theme/assets/images/sample-user.png" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                    <span class="name">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span>
                    <span class="role">{{Auth::user()->position}}</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                    </li>
                    <li>
                    <a role="menuitem" tabindex="-1" href="{{URL::to('/')}}/User/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>