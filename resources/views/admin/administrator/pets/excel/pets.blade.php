<table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
    <thead>
        <tr>
          <th>Código QR</th>
          <th>Especie</th>
          <th>Raza</th>
          <th>Mascota</th>
          <th>Nombre Propietario</th>
          <th>Estado</th>

        </tr>
    </thead>
    <tbody>
        @foreach($pets as $pet)
        <?php
            //Decode Values
            $image = json_decode($pet->imageProfile);
            $characteristics = json_decode($pet->characteristics);
        ?>
        <tr>
          <td>
            @if($pet->haveCode == TRUE)
              <?php
                $c = $code->getCodeByPet($pet->id);
                echo $c;
               ?>
            @else
              Sin asignar
            @endif
          </td>
          <td>
            @if($pet->petType == 1)
              Canino(a)
            @elseif($pet->petType == 2)
              Felino(a)
            @else
              Otros
            @endif
          </td>
          <td>{{$characteristics->raza}}</td>
          <td>{{$pet->name}}</td>
          <td>{{$pet->nameUser}} {{$pet->lastNameUser}}</td>
          <td>
            @if($pet->petStatus == 1)
              Activo
            @else
              Inactivo
            @endif
          </td>

        </tr>
        @endforeach
    </tbody>
</table>
