{{--<li class="{{ Request::is('pins*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('pins.index') !!}"><i class="fa fa-edit"></i><span>Pins</span></a>--}}
{{--</li>--}}
<li class="treeview {{ Request::is('pins*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-key"></i> <span>Pin</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{Request::is('pins*') ? 'active' : '' }}">
            <a href="{!! route('pins.index') !!}"><i class="fa fa-angle-right"></i>All Pins</a>
        </li>

    </ul>
</li>

