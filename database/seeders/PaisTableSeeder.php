<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{

    public function run()
    {
        // Crear los paises
        $paises = [
            ['nombre' => 'Afganistán', 'codigo' => '+93'],
            ['nombre' => 'Albania', 'codigo' => '+355'],
            ['nombre' => 'Alemania', 'codigo' => '+49'],
            ['nombre' => 'Andorra', 'codigo' => '+376'],
            ['nombre' => 'Angola', 'codigo' => '+244'],
            ['nombre' => 'Anguila', 'codigo' => '+1-264'],
            ['nombre' => 'Antártida', 'codigo' => '+672'],
            ['nombre' => 'Antigua y Barbuda', 'codigo' => '+1-268'],
            ['nombre' => 'Arabia Saudita', 'codigo' => '+966'],
            ['nombre' => 'Argelia', 'codigo' => '+213'],
            ['nombre' => 'Argentina', 'codigo' => '+54'],
            ['nombre' => 'Armenia', 'codigo' => '+374'],
            ['nombre' => 'Aruba', 'codigo' => '+297'],
            ['nombre' => 'Australia', 'codigo' => '+61'],
            ['nombre' => 'Austria', 'codigo' => '+43'],
            ['nombre' => 'Azerbaiyán', 'codigo' => '+994'],
            ['nombre' => 'Bahamas', 'codigo' => '+1-242'],
            ['nombre' => 'Bangladés', 'codigo' => '+880'],
            ['nombre' => 'Baréin', 'codigo' => '+973'],
            ['nombre' => 'Barbados', 'codigo' => '+1-246'],
            ['nombre' => 'Bélgica', 'codigo' => '+32'],
            ['nombre' => 'Belice', 'codigo' => '+501'],
            ['nombre' => 'Benín', 'codigo' => '+229'],
            ['nombre' => 'Bermudas', 'codigo' => '+1-441'],
            ['nombre' => 'Bielorrusia', 'codigo' => '+375'],
            ['nombre' => 'Birmania', 'codigo' => '+95'],
            ['nombre' => 'Bolivia', 'codigo' => '+591'],
            ['nombre' => 'Bosnia y Herzegovina', 'codigo' => '+387'],
            ['nombre' => 'Bosnia y Herzegovina', 'codigo' => '+387'],
            ['nombre' => 'Bosnia y Herzegovina', 'codigo' => '+387'],
            ['nombre' => 'Bosnia y Herzegovina', 'codigo' => '+387'],
            ['nombre' => 'Bosnia y Herzegovina', 'codigo' => '+387'],
            ['nombre' => 'Bosnia y Herzegovina', 'codigo' => '+387'],
            ['nombre' => 'Botsuana', 'codigo' => '+267'],
            ['nombre' => 'Brasil', 'codigo' => '+55'],
            ['nombre' => 'Brunéi', 'codigo' => '+673'],
            ['nombre' => 'Bulgaria', 'codigo' => '+359'],
            ['nombre' => 'Burkina Faso', 'codigo' => '+226'],
            ['nombre' => 'Burundi', 'codigo' => '+257'],
            ['nombre' => 'Bután', 'codigo' => '+975'],
            ['nombre' => 'Cabo Verde', 'codigo' => '+238'],
            ['nombre' => 'Camboya', 'codigo' => '+855'],
            ['nombre' => 'Camerún', 'codigo' => '+237'],
            ['nombre' => 'Canadá', 'codigo' => '+1'],
            ['nombre' => 'Chad', 'codigo' => '+235'],
            ['nombre' => 'Chile', 'codigo' => '+56'],
            ['nombre' => 'China', 'codigo' => '+86'],
            ['nombre' => 'Chipre', 'codigo' => '+357'],
            ['nombre' => 'Ciudad del Vaticano', 'codigo' => '+379'],
            ['nombre' => 'Colombia', 'codigo' => '+57'],
            ['nombre' => 'Comoras', 'codigo' => '+269'],
            ['nombre' => 'Congo', 'codigo' => '+242'],
            ['nombre' => 'Corea del Norte', 'codigo' => '+850'],
            ['nombre' => 'Corea del Sur', 'codigo' => '+82'],
            ['nombre' => 'Costa de Marfil', 'codigo' => '+225'],
            ['nombre' => 'Costa Rica', 'codigo' => '+506'],
            ['nombre' => 'Croacia', 'codigo' => '+385'],
            ['nombre' => 'Cuba', 'codigo' => '+53'],
            ['nombre' => 'Dinamarca', 'codigo' => '+45'],
            ['nombre' => 'Dominica', 'codigo' => '+1-767'],
            ['nombre' => 'Ecuador', 'codigo' => '+593'],
            ['nombre' => 'Egipto', 'codigo' => '+20'],
            ['nombre' => 'El Salvador', 'codigo' => '+503'],
            ['nombre' => 'Emiratos Árabes Unidos', 'codigo' => '+971'],
            ['nombre' => 'Eritrea', 'codigo' => '+291'],
            ['nombre' => 'Eslovaquia', 'codigo' => '+421'],
            ['nombre' => 'Eslovenia', 'codigo' => '+386'],
            ['nombre' => 'España', 'codigo' => '+34'],
            ['nombre' => 'Estados Federados de Micronesia', 'codigo' => '+691'],
            ['nombre' => 'Estados Unidos de América', 'codigo' => '+1'],
            ['nombre' => 'Estonia', 'codigo' => '+372'],
            ['nombre' => 'Etiopía', 'codigo' => '+251'],
            ['nombre' => 'Filipinas', 'codigo' => '+63'],
            ['nombre' => 'Finlandia', 'codigo' => '+358'],
            ['nombre' => 'Fiyi', 'codigo' => '+679'],
            ['nombre' => 'Francia', 'codigo' => '+33'],
            ['nombre' => 'Gabón', 'codigo' => '+241'],
            ['nombre' => 'Gambia', 'codigo' => '+220'],
            ['nombre' => 'Georgia', 'codigo' => '+995'],
            ['nombre' => 'Ghana', 'codigo' => '+233'],
            ['nombre' => 'Gibraltar', 'codigo' => '+350'],
            ['nombre' => 'Grecia', 'codigo' => '+30'],
            ['nombre' => 'Groenlandia', 'codigo' => '+299'],
            ['nombre' => 'Guadalupe', 'codigo' => '+590'],
            ['nombre' => 'Guam', 'codigo' => '+1-671'],
            ['nombre' => 'Guatemala', 'codigo' => '+502'],
            ['nombre' => 'Guayana Francesa', 'codigo' => '+594'],
            ['nombre' => 'Guernsey', 'codigo' => '+44-1481'],
            ['nombre' => 'Guinea', 'codigo' => '+224'],
            ['nombre' => 'Guinea Ecuatorial', 'codigo' => '+240'],
            ['nombre' => 'Guinea-Bisáu', 'codigo' => '+245'],
            ['nombre' => 'Guyana', 'codigo' => '+592'],
            ['nombre' => 'Haití', 'codigo' => '+509'],
            ['nombre' => 'Honduras', 'codigo' => '+504'],
            ['nombre' => 'Hong Kong', 'codigo' => '+852'],
            ['nombre' => 'Hungría', 'codigo' => '+36'],
            ['nombre' => 'India', 'codigo' => '+91'],
            ['nombre' => 'Indonesia', 'codigo' => '+62'],
            ['nombre' => 'Irak', 'codigo' => '+964'],
            ['nombre' => 'Irán', 'codigo' => '+98'],
            ['nombre' => 'Irlanda', 'codigo' => '+353'],
            ['nombre' => 'Isla de Man', 'codigo' => '+44-1624'],
            ['nombre' => 'Isla Pitcairn', 'codigo' => '+64'],
            ['nombre' => 'Islas Caimán', 'codigo' => '+1-345'],
            ['nombre' => 'Islas Cook', 'codigo' => '+682'],
            ['nombre' => 'Islas Feroe', 'codigo' => '+298'],
            ['nombre' => 'Islas Malvinas', 'codigo' => '+500'],
            ['nombre' => 'Islas Marianas del Norte', 'codigo' => '+1-670'],
            ['nombre' => 'Islas Marshall', 'codigo' => '+692'],
            ['nombre' => 'Islas Salomón', 'codigo' => '+677'],
            ['nombre' => 'Islas Turcas y Caicos', 'codigo' => '+1-649'],
            ['nombre' => 'Islas Vírgenes Británicas', 'codigo' => '+1-284'],
            ['nombre' => 'Islas Vírgenes de los Estados Unidos', 'codigo' => '+1-340'],
            ['nombre' => 'Israel', 'codigo' => '+972'],
            ['nombre' => 'Italia', 'codigo' => '+39'],
            ['nombre' => 'Jamaica', 'codigo' => '+1-876'],
            ['nombre' => 'Japón', 'codigo' => '+81'],
            ['nombre' => 'Jersey', 'codigo' => '+44-1534'],
            ['nombre' => 'Jordania', 'codigo' => '+962'],
            ['nombre' => 'Kazajistán', 'codigo' => '+7'],
            ['nombre' => 'Kenia', 'codigo' => '+254'],
            ['nombre' => 'Kirguistán', 'codigo' => '+996'],
            ['nombre' => 'Kiribati', 'codigo' => '+686'],
            ['nombre' => 'Kuwait', 'codigo' => '+965'],
            ['nombre' => 'Laos', 'codigo' => '+856'],
            ['nombre' => 'Lesoto', 'codigo' => '+266'],
            ['nombre' => 'Letonia', 'codigo' => '+371'],
            ['nombre' => 'Líbano', 'codigo' => '+961'],
            ['nombre' => 'Liberia', 'codigo' => '+231'],
            ['nombre' => 'Libia', 'codigo' => '+218'],
            ['nombre' => 'Liechtenstein', 'codigo' => '+423'],
            ['nombre' => 'Lituania', 'codigo' => '+370'],
            ['nombre' => 'Luxemburgo', 'codigo' => '+352'],
            ['nombre' => 'Macao', 'codigo' => '+853'],
            ['nombre' => 'Macedonia del Norte', 'codigo' => '+389'],
            ['nombre' => 'Madagascar', 'codigo' => '+261'],
            ['nombre' => 'Malasia', 'codigo' => '+60'],
            ['nombre' => 'Malaui', 'codigo' => '+265'],
            ['nombre' => 'Maldivas', 'codigo' => '+960'],
            ['nombre' => 'Malí', 'codigo' => '+223'],
            ['nombre' => 'Malta', 'codigo' => '+356'],
            ['nombre' => 'Marruecos', 'codigo' => '+212'],
            ['nombre' => 'Martinica', 'codigo' => '+596'],
            ['nombre' => 'Mauricio', 'codigo' => '+230'],
            ['nombre' => 'Mauritania', 'codigo' => '+222'],
            ['nombre' => 'Mayotte', 'codigo' => '+262'],
            ['nombre' => 'México', 'codigo' => '+52'],
            ['nombre' => 'Moldavia', 'codigo' => '+373'],
            ['nombre' => 'Mónaco', 'codigo' => '+377'],
            ['nombre' => 'Mongolia', 'codigo' => '+976'],
            ['nombre' => 'Montenegro', 'codigo' => '+382'],
            ['nombre' => 'Montserrat', 'codigo' => '+1-664'],
            ['nombre' => 'Mozambique', 'codigo' => '+258'],
            ['nombre' => 'Namibia', 'codigo' => '+264'],
            ['nombre' => 'Nauru', 'codigo' => '+674'],
            ['nombre' => 'Nepal', 'codigo' => '+977'],
            ['nombre' => 'Nicaragua', 'codigo' => '+505'],
            ['nombre' => 'Níger', 'codigo' => '+227'],
            ['nombre' => 'Nigeria', 'codigo' => '+234'],
            ['nombre' => 'Niue', 'codigo' => '+683'],
            ['nombre' => 'Noruega', 'codigo' => '+47'],
            ['nombre' => 'Nueva Caledonia', 'codigo' => '+687'],
            ['nombre' => 'Nueva Zelanda', 'codigo' => '+64'],
            ['nombre' => 'Omán', 'codigo' => '+968'],
            ['nombre' => 'Países Bajos', 'codigo' => '+31'],
            ['nombre' => 'Pakistán', 'codigo' => '+92'],
            ['nombre' => 'Palaos', 'codigo' => '+680'],
            ['nombre' => 'Palestina', 'codigo' => '+970'],
            ['nombre' => 'Panamá', 'codigo' => '+507'],
            ['nombre' => 'Papúa Nueva Guinea', 'codigo' => '+675'],
            ['nombre' => 'Paraguay', 'codigo' => '+595'],
            ['nombre' => 'Perú', 'codigo' => '+51'],
            ['nombre' => 'Polinesia Francesa', 'codigo' => '+689'],
            ['nombre' => 'Polonia', 'codigo' => '+48'],
            ['nombre' => 'Portugal', 'codigo' => '+351'],
            ['nombre' => 'Puerto Rico', 'codigo' => '+1-787'],
            ['nombre' => 'Reino Unido', 'codigo' => '+44'],
            ['nombre' => 'República Centroafricana', 'codigo' => '+236'],
            ['nombre' => 'República Checa', 'codigo' => '+420'],
            ['nombre' => 'República Democrática del Congo', 'codigo' => '+243'],
            ['nombre' => 'República Dominicana', 'codigo' => '+1-809'],
            ['nombre' => 'Ruanda', 'codigo' => '+250'],
            ['nombre' => 'Rumania', 'codigo' => '+40'],
            ['nombre' => 'Rusia', 'codigo' => '+7'],
            ['nombre' => 'Sáhara Occidental', 'codigo' => '+212'],
            ['nombre' => 'Samoa', 'codigo' => '+685'],
            ['nombre' => 'Samoa Americana', 'codigo' => '+1-684'],
            ['nombre' => 'San Cristóbal y Nieves', 'codigo' => '+1-869'],
            ['nombre' => 'San Marino', 'codigo' => '+378'],
            ['nombre' => 'San Vicente y las Granadinas', 'codigo' => '+1-784'],
            ['nombre' => 'Santa Lucía', 'codigo' => '+1-758'],
            ['nombre' => 'Santo Tomé y Príncipe', 'codigo' => '+239'],
            ['nombre' => 'Senegal', 'codigo' => '+221'],
            ['nombre' => 'Serbia', 'codigo' => '+381'],
            ['nombre' => 'Seychelles', 'codigo' => '+248'],
            ['nombre' => 'Sierra Leona', 'codigo' => '+232'],
            ['nombre' => 'Singapur', 'codigo' => '+65'],
            ['nombre' => 'Siria', 'codigo' => '+963'],
            ['nombre' => 'Somalia', 'codigo' => '+252'],
            ['nombre' => 'Sri Lanka', 'codigo' => '+94'],
            ['nombre' => 'Suazilandia', 'codigo' => '+268'],
            ['nombre' => 'Sudáfrica', 'codigo' => '+27'],
            ['nombre' => 'Sudán', 'codigo' => '+249'],
            ['nombre' => 'Sudán del Sur', 'codigo' => '+211'],
            ['nombre' => 'Suecia', 'codigo' => '+46'],
            ['nombre' => 'Suiza', 'codigo' => '+41'],
            ['nombre' => 'Surinam', 'codigo' => '+597'],
            ['nombre' => 'Tailandia', 'codigo' => '+66'],
            ['nombre' => 'Taiwán', 'codigo' => '+886'],
            ['nombre' => 'Tanzania', 'codigo' => '+255'],
            ['nombre' => 'Tayikistán', 'codigo' => '+992'],
            ['nombre' => 'Timor Oriental', 'codigo' => '+670'],
            ['nombre' => 'Togo', 'codigo' => '+228'],
            ['nombre' => 'Tokelau', 'codigo' => '+690'],
            ['nombre' => 'Tonga', 'codigo' => '+676'],
            ['nombre' => 'Trinidad y Tobago', 'codigo' => '+1-868'],
            ['nombre' => 'Túnez', 'codigo' => '+216'],
            ['nombre' => 'Turkmenistán', 'codigo' => '+993'],
            ['nombre' => 'Turquía', 'codigo' => '+90'],
            ['nombre' => 'Tuvalu', 'codigo' => '+688'],
            ['nombre' => 'Ucrania', 'codigo' => '+380'],
            ['nombre' => 'Uganda', 'codigo' => '+256'],
            ['nombre' => 'Uruguay', 'codigo' => '+598'],
            ['nombre' => 'Uzbekistán', 'codigo' => '+998'],
            ['nombre' => 'Vanuatu', 'codigo' => '+678'],
            ['nombre' => 'Venezuela', 'codigo' => '+58'],
            ['nombre' => 'Vietnam', 'codigo' => '+84'],
            ['nombre' => 'Wallis y Futuna', 'codigo' => '+681'],
            ['nombre' => 'Yemen', 'codigo' => '+967'],
            ['nombre' => 'Yibuti', 'codigo' => '+253'],
            ['nombre' => 'Zambia', 'codigo' => '+260'],
            ['nombre' => 'Zimbabue', 'codigo' => '+263']
        ];
        foreach ($paises as $pais) {
            Pais::create($pais);
        } 
    }
}