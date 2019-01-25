<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
      DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Affenpinscher',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Akita inu',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Akita Americano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Alano Español',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'race',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'American Bully',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'American Foxhound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'American Pitbull Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'American Staffordshire',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Antiguo Danes',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Australian Silky terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Azawakh',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Barbet',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Basenji',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Basset de Normandia',
        ]);

   DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Basset Azul de Gasconia',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Basset Hound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Basset Leonado de Bretaña',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Beagle',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Beagle Harrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bedlington Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Berger de Picardie',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bichon Boloñes',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bichon Frise',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bichon Habanero',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Maltes',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Billy',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Black and Tan Coonhound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bloodhound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bobtail',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bodeguero Andaluz',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Border Collie',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Border Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Borsoi Galo ruso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Boston Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Boxer',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Boyero Australiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco Aleman',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco Aleman pelo duro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco de Auvernia',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco de Weimar',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco de Weimar',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco de Ariege',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Braco italiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Briard',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Britanny',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Broholmer',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Buhund Noruego',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bull Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bull Terrier Mini',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bulldog',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bulldog Americano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bulldog Frances',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Bullmastin',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cairn Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cane Corso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Caniche',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Carlino',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cavalier King Charles',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Chihuahua',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Chow Chow',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cirneco del Etna',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Clumber spaniel',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cobrador de Nueva Escocia',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cocker Spaniel',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Cocker americano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Collie',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Collie barbudo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Collie Smooth',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Corgi Gales Cardigan',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Corgi Gales Penbroke',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Criollo Colombiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Coton de tulear',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Curly Retriever',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Dalmata',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Deerhound escoces',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Doberman',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Dogo Argentino',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Dogo Canario',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Dogo de Burdeos',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Dogo Mallorquin',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Drever',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Elkhound Noruego',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Epagneul Breton',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Eurasier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Faraon Hound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Field spaniel',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Fila Brasilero',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Fila de San Miguel',
        ]);
  DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Fox Terrier Pelo Duro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Fox Terrier Pelo Liso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Fox Terrier Toy',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Foxhound Americano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Foxhound Inglés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Galgo Español',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Galgo Italiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Gascon Saintongeois',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Glenn of Imaal Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Golden Retriever',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Gran Basset Grifon',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Gran Danes',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Greyhound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Grifon Belga',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Grifon de Brucelas',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Grifon Bohemio Pelo Duro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Grifon Eslovaco',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Hamilton Stovare',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Harrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Hokkaido',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Hovawart',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Husky Siberiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Irish Soft coated',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Jack Russell Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Jamthund',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Kai',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Karjalankarhukoira ',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Keeshond',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Kerry Blue Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Kishu',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Komondor',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Korea Jinco Dog',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Kromfohrländer',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Kuvasc',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Labrador',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Laïka de Siberia oriental',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Laïka Ruso-Europeo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Lakeland Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Landseer',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Lebrel Húngaro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Leonberger',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Lhasa Apso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Lundehund noruego',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Löwchen',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Malamute',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Mastin',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Mastin Napolitano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Mastin Tibetano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Mudi',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Münsterländer grande',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Münsterländer pequeño',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Papillon',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Parson Russell Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Alemán',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Australiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Belga',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Blanco Suizo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Catalán',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor de Anatolia',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Belga',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor de Los Pirineos',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor de Shetland',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pastor Polaco de Tierras Bajas',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pequeño Basset Grifón vendeano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pequeño Brabanzón',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pequeño perro holandés para la caza acuática',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pequinés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perdiguero de Burgos',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perdiguero de Drente',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perdiguero portugués',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Entlebucher',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro Crestado Chino',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Agua Americano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro De Agua Español',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Aguas Portugués',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Canaan',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Castro Laboreiro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Groenlandia',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Montaña Appenzell',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Montaña Bernés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de pastor de Rusia Meridional',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de pastor del Cáucaso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Pastor islandés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de pastor polaco de las Llanuras',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de pastor polaco de Podhale',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de pastor portugués',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro de Pastor yugoslavo de Charplanina',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro Esquimal Americano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro Esquimal Canadiense',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro Lobo Checoslavaco',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro lobo de Sarloos',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Perro Pastor Croato',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pinscher',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pinscher Miniatura',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pointer',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pointer Alemán de Pelo Corto',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pointer Alemán de Pelo Duro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pomerania',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Pumi',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Retriever de Pelo Liso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Ridgeback de Rodesia ',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Rottweiler',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Rastreador de Hannover',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso alemán',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso austriaco negro y fuego',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso de Bosnia de pelo cerdoso',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso de Hygen',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso de las Montañas de Montenegro',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso de Smaland',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso de Transilvania',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso del Tirol',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso eslovaco',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso español',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso Schiller',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sabueso suizo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Saluki (galgo Persa)',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Samoyedo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'San Bernardo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Schipperke',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Schnauzer',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Schnauzer Gigante',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Schnauzer Miniatura',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sealyham Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Setter Gordon',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Setter Inglés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Setter Irlandés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Setter irlandés rojo',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Setter irlandés rojo y blanco',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Shar Pei',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Shiba',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'ShihTzu',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Shikoku',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Silky Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sin Raza o Mestizos',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Sloughi (galgo árabe)',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Spaniel continental enano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Spaniel Tibetano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Spitz Alemán',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Spitz Japonés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Springer Spaniel Galés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Springer Spaniel Inglés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Staffordshire Bull Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Teckel',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Tejonero alpino',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terranova',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Australiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Brasileño',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier cazador alemán',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Cesky',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Escocés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Galés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Irlandés',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Terrier Tibetano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Tosa Inu',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Valhund Sueco',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Vizsla',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Volpino Italiano',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'West Highland',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Wetterhound',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Wheaten Terrier',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Whippet',
        ]);
        DB::table('Characteristics')->insert([
            'petType' => 1,
            'race' => 'Yorkshire terrier',
        ]);


      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Bambino',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Bengalíes',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Bobtail Japonés',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Bombay',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'British Shorthair',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Burmilla',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'California Spangled',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Ceilán',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Chartreux',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Cornish Rex',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Criollo',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Cymric',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Devon Rex',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Donskoy',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Elfo',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Esfinge',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'exóticos',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Foldex',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'German Rex',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Habana',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Highland Fold',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Himalayos',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Korat',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Maine Coon',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Manx',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Mau egipcio',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Munchkin',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Nebelung',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Ocicat',
      ]);
      DB::table('Characteristics')->insert([
      'petType' => 2,
      'race' => 'Peterbald',
      ]);
      */
    }
}
