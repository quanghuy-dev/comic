<header class="header" id="header">
    <div class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a class="logo" title="Truyện tranh online" href="{{route('home')}}" style="text-decoration: none;">
                        ComicBuddy
                    </a>
                </div>
                <div class="navbar-form navbar-left hidden-xs search-box comicsearchbox">
                    <form action="{{route('genre')}}" method="Get">
                        <div class="input-group">
                            <input type="text" name="keyword" class="searchinput form-control" placeholder="Search manga..." autocomplete="off">
                            <div class="input-group-btn">
                                <input type="submit" value="" class="searchbutton btn btn-default">
                            </div>
                        </div>
                    </form>
                </div>
                <i class="fa fa-lightbulb-o toggle-dark"></i>
                <div class="notifications"><a href="#" title="Thông báo"><i class="fa fa-comment"></i></a></div><button type="button" class="search-button-icon visible-xs" aria-label="Search">
                    <i class="fa fa-search"></i>
                </button>
                <button type="button" class="navbar-toggle" aria-label="Menu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <script>
                var gOpts = {};
                gOpts.host = "{{request()->getHost()}}";
                var _0xcca4 = [".toggle-dark", "querySelector", "undefined", "body", "class", "fa fa-lightbulb-o on toggle-dark", "setAttribute", "dark", "indexOf", "getAttribute", " dark", "fa fa-lightbulb-o toggle-dark", "", "replace", "dark-theme", "click", "removeItem", "addEventListener", "parentNode", "removeChild"],
                    toggleDarkObj = document[_0xcca4[1]](_0xcca4[0]);
                if (_0xcca4[2] != typeof Storage) {
                    function setDarkTheme(c, a) {
                        var e = document[_0xcca4[3]];
                        1 == a ? (c[_0xcca4[6]](_0xcca4[4], _0xcca4[5]), e[_0xcca4[9]](_0xcca4[4])[_0xcca4[8]](_0xcca4[7]) < 0 && e[_0xcca4[6]](_0xcca4[4], e[_0xcca4[9]](_0xcca4[4]) + _0xcca4[10])) : (c[_0xcca4[6]](_0xcca4[4], _0xcca4[11]), e[_0xcca4[9]](_0xcca4[4])[_0xcca4[8]](_0xcca4[10]) >= 0 && e[_0xcca4[6]](_0xcca4[4], e[_0xcca4[9]](_0xcca4[4])[_0xcca4[13]](_0xcca4[10], _0xcca4[12])))
                    }
                    void 0 !== localStorage[_0xcca4[14]] && setDarkTheme(toggleDarkObj, !0), toggleDarkObj[_0xcca4[17]](_0xcca4[15], (function(c) {
                        _0xcca4[11] == this[_0xcca4[9]](_0xcca4[4]) ? (setDarkTheme(this, !0), localStorage[_0xcca4[14]] = 1) : (setDarkTheme(this, !1), void 0 !== localStorage[_0xcca4[14]] && localStorage[_0xcca4[16]](_0xcca4[14]))
                    }))
                } else toggleDarkObj[_0xcca4[18]] && toggleDarkObj[_0xcca4[18]][_0xcca4[19]](toggleDarkObj);
            </script>
            <ul class="nav-account list-inline hidden-xs pull-right">
                @if(Auth::guard('web')->check())
                <li class="dropdown">
                    <a data-toggle="dropdown" class="user-menu fn-userbox dropdown-toggle" href="javascript:void(0);">
                        <img class="fn-thumb" alt="" src="{{Auth::guard('web')->user()->avatar != null ? asset('/uploads/customers/'.Auth::guard('web')->user()->avatar) : asset('uploads/no_image/anonymous.png') }}">
                        <span>Your Account</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a rel="nofollow" class="user-profile-link-desktop" href="{{route('general')}}"><i class="fa fa-user"></i>
                                Personal Information
                            </a>
                        </li>
                        <li><a rel="nofollow" id="user_logout_desktop" href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Sign-Out</a></li>
                    </ul>
                </li>
                @else
                <li class="login-link"><a rel="nofollow" href="{{route('login')}}">Đăng nhập</a></li>
                <li class="register-link"><a rel="nofollow" href="{{route('register')}}">Đăng ký</a></li>
                @endif
            </ul>
        </div>
    </div>
</header>