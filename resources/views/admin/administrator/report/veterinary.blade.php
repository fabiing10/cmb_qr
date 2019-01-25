<table>
  <thead>
    <tr>
      <th>Veterinaria</th>
      <th>Sede</th>
      <th>Tipo Veterinaria</th>
      <th>Dirección</th>
      <th>Ciudad</th>
      <th>Telefono</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach($veterinary as $data)
    <tr>

      <td>{{$data->nameVeterinary}}</td>
      @if($data->nameHeadquarter != '')
      <td>{{$data->nameHeadquarter}}</td>
      @else
      <td>{{$data->nameVeterinary}}</td>
      @endif
      @if($data->principal != false)
      <td>Principal</td>
      @else
      <td>Sede</td>
      @endif
      <td>{{$data->address}}</td>
      <td>{{$data->city}}</td>
      <td>{{$data->phone}}</td>
      <td>{{$data->email}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
