<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>
                            Dashboard
                        </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> Room
                            Type </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('room-type.index') }}">List</a></li>
                        <li><a href="{{ route('room-type.create') }}">Add</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Room
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('room.index') }}">List</a></li>
                        <li><a href="{{ route('room.create') }}">Add</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('booking.index') }}" class="waves-effect"><i class="mdi mdi-diamond-stone"></i><span>
                            Booking
                        </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>

        <div class="help-box">
            <h5 class="text-muted m-t-0">For Help ?</h5>
            <p class=""><span class="text-custom">Email:</span> <br /> admin@admin.com</p>
            <p class="m-b-0"><span class="text-custom">Call:</span> <br /> (+123) 123 456 789</p>
        </div>

    </div>

</div>
