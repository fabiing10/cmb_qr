<li class="data-name" style="display:none;">
  {{session('nameVeterinary')}}
</li>

<li class="site-menu-item has-sub">
    <a href="/user">
        <i class="site-menu-icon wb-home" aria-hidden="true"></i>
        <span class="site-menu-title">Home</span>
        <div class="site-menu-badge">
        </div>
    </a>
</li>

<!--<li class="site-menu-item has-sub">
    <a class="animsition-link" href="javascript:void(0)">
      <i class="site-menu-icon wb-user" aria-hidden="true"></i>
        <span class="site-menu-title">Propietarios</span>
    </a>
</li>-->
<li class="site-menu-item has-sub">
    <a href="/user/pets">
        <img src="{{URL::asset('admin/assets/images/pets.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Mascotas</span>
    </a>
</li>
<li class="site-menu-item has-sub">
    <a href="/user/profile">
        <img src="{{URL::asset('admin/assets/images/user.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Perfil</span>
    </a>
</li>
<li class="site-menu-item has-sub">
    <a href="/user/appointments">
        <img src="{{URL::asset('admin/assets/images/clock.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Citas</span>
    </a>
</li>
</li>
