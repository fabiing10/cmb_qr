<table>
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Ciudad</th>
      <th>Nombre Sede</th>
      <th>Direccion</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    @foreach($headquarters as $headquarter)
      <tr>
          @if($headquarter->principal == TRUE)
            <td>Principal</td>
          @else
            <td>Sede</td>
          @endif
          <td>{{$headquarter->city}}</td>
          <td>{{$headquarter->name}}</td>
          <td>{{$headquarter->address}}</td>
          <td>{{$headquarter->phone}}</td>
      </tr>
    @endforeach

  </tbody>
</table>
