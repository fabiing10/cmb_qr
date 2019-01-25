<table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
  <thead>
    <tr>

      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Telefono</th>
      <th>Dirección</th>
      <th>Correo electronico</th>
      <th>Username</th>
      <th>Fecha de registro</th>

    </tr>
  </thead>
  <tbody>
    @foreach($clients as $client)
    <tr>

      <td>{{$client->name}}</td>
      <td>{{$client->lastName}}</td>
      <td>
        <?php
        $phonesResult = json_decode($client->phones);
        if($phonesResult == ""){
          $phones = "Sin asignar";
        }else{
          $phones = $phonesResult->phone;
        }
        ?>
        {{$phones}}
      </td>
      <td>{{$client->address}}</td>
      <td>{{$client->email}}</td>
      <td>{{$client->username}}</td>
      <td>{{$client->registerDate}}</td>

    </tr>
    @endforeach
  </tbody>
</table>
