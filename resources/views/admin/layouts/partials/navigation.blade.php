<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="امور کاربران">
                <a href="#users" title="امور کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="امور دسته بندی ها">
                <a href="#blog" title="امور دسته بندی ها">
                    <i class="icon ti-book"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="امور کامنت ها">
                <a href="#comment" title="امور کامنت ها">
                    <i class="icon ti-comments"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="{{route('admin.users.edit',auth()->user()->id)}}" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <li data-toggle="tooltip" title="خروج">
                    <button name="submit" type="submit" class="btn text-white w-100">
                        <i class="icon ti-power-off w-100"></i>
                    </button>
                </li>
            </form>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مسئول کاربران'))
                        <li><a href="{{route('admin.users.create')}}">ایجاد کاربر</a></li>
                    @endif
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مسئول کاربران'))
                        <li><a href="{{route('admin.users.index')}}">لیست کاربران</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    @if(auth()->user()->hasRole('مدیر'))
                        <li><a href="{{route('admin.roles.create')}}">ایجاد نقش</a></li>
                    @endif
                    @if(auth()->user()->hasRole('مدیر'))
                        <li><a href="{{route('admin.roles.index')}}">لیست نقش ها</a></li>
                    @endif
                </ul>
            </li>
        </ul>
        <ul id="blog">
            <li>
                <a href="#">دسته بندی ها</a>
                <ul>
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مسئول مقالات'))
                        <li><a href="{{route('admin.categories.create')}}">ایجاد دسته بندی</a></li>
                    @endif
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مسئول مقالات'))
                        <li><a href="{{route('admin.categories.index')}}">لیست دسته بندی ها</a></li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="#">مقاله ها</a>
                <ul>
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('نویسنده'))
                        <li><a href="{{route('admin.articles.create')}}">ایجاد مقاله</a></li>
                    @endif
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('مسئول مقالات') || auth()->user()->hasRole('ناظر'))
                        <li><a href="{{route('admin.articles.index')}}">لیست مقالات</a></li>
                    @endif
                </ul>
            </li>
        </ul>
        <ul id="comment">
            <li>
                <a href="#">کامنت ها</a>
                <ul>
                    @if(auth()->user()->hasRole('مدیر') || auth()->user()->hasRole('ناظر'))
                        <li><a href="{{route('admin.comments')}}">لیست کامنت ها</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</div>
