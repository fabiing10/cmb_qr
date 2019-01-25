<li class="data-name" style="display:none;">
  {{session('nameVeterinary')}}
</li>
<li class="site-menu-item has-sub">
    <a href="/administrator">
        <img src="{{URL::asset('admin/assets/images/home-admin.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Inicio</span>
        <div class="site-menu-badge">
        </div>
    </a>
</li>
<?php
$user = Auth::user();
$headquarterVeterinary = \App\UserVeterinary::where('userId','=',$user->id)->first();
$headquarter = \App\Headquarter::find($headquarterVeterinary->headquarterId);

if($headquarter->principal == true){
?>
    <li class="site-menu-item has-sub">
        <a href="/administrator/headquarters">
        <img src="{{URL::asset('admin/assets/images/home-admin.png')}}" style="width:10%; margin-right:13px;">
            <span class="site-menu-title">Sedes</span>
            <div class="site-menu-badge">
            </div>
        </a>
    </li>
<?php
}
?>
<li class="site-menu-item has-sub">
    <a href="/administrator/clients">
        <img src="{{URL::asset('admin/assets/images/clients-admin.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Clientes</span>
    </a>
</li>
<li class="site-menu-item has-sub">
    <a href="/administrator/pets">
        <img src="{{URL::asset('admin/assets/images/iconos/mascotas-menu.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Mascotas</span>
    </a>
</li>
<li class="site-menu-item has-sub">
    <a href="/administrator/codes">
        <img src="{{URL::asset('admin/assets/images/codes-admin.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Codigos</span>
    </a>
</li>
<li class="site-menu-item has-sub">
    <a href="/administrator/appointments">
        <img src="{{URL::asset('admin/assets/images/appointments-admin.png')}}" style="width:12%; margin-right:10px;">
        <span class="site-menu-title">Citas</span>
    </a>
</li>
