<?php

namespace MinkFieldRandomizer\Model;

use Exception;
use MinkFieldRandomizer\Filter\FilterInterface;

class RandomSurname implements FilterInterface
{
    /**
     * @param $value
     * @param $params
     *
     * @return mixed
     */
    public function filter($params)
    {
        if (count($params) > 0) {
            throw new Exception("RandomSurname does not accept parameters");
        }

        $surnames = explode(
            " ",
            "Abadía Abarca Abastos Abaunza Abbot Abdallá Abdalah Abdallah Abdelnour Abdo Abea Abel Abela Abelado Abella"
            ." Abellán Abendaño Abou Abraham Abrahams Abrahán Abrego Abreu Abrigo Abril Abufelo Abugadba Aburto Acabal"
            ." Acebal Acedo Acevedo Acosta Acuña Adames Adamis Adanaque Adanis Adis Aedo Agababa Agámez Agayón Agrazal"
            ." Agreda Aguayo Agudelo Agüero Aguiar Aguilar Aguilera Aguiluz Aguilve Aguinaga Aguirre Agurto Agustín Ahuja"
            ." Ahumada Aiello Aiza Aizprúa Aizpurúa Alache Alama Alan Alani Alanis Alanís Alaniz Alarcón Alas Alavez"
            ." Alayón Alba Albarello Albarracín Albelo Albenda Alburola Alcaíno Alcanzar Alcázar Alcazar Alcibar Alcócer"
            ." Alcóser Alcóver Alcózer Aldana Aldaña Aldapa Aldecoba Alderrama Alegría Alejos Alemán Alexander Alexandre"
            ." Alfaro Alfonso Algaba Alguera Aliaga Alicama Alier Alizaga Allan Allon Barrero Barreto Barrias Barrientos"
            ." Barriga Barrio Barrionuevo Barrios Barroso Barrot Barrott Barrundia Barsallo Bart Bartal Barteles Bartels"
            ." Barth Barvas Baruch Basadre Basán Basilio Basti Bastida Bastos Bastti Batalla Batán Batista Batres"
            ." Bautista Bauzid Baviera Bayo Bazán Bazo Beatriz Becancur Becerra Becerril Bedolla Bedoya Beeche Beeché"
            ." Beingolea Beita Bejarano Bejos Bel Belette Belgrave Bellanero Bellido Bello Belloso Belmonte Beltrán Beltre"
            ." Benach Benambourg Benambugr Benambur Benavente Benavides Benavídez Benda Bendaña Bendig Bendij Benedictis"
            ." Beneditt Benevides Bengoechea Benites Benítez Benito Benzón Berasaluce Berciano Berdasco Berdugo Berenzón"
            ." Bermejo Bermeo Bermudes Bermúdez Bernadas Bernal Bernardo Bernat Berrios Berríos Berrocal Berrón Bertel"
            ." Bertrán Betancort Bentancourt Betancourth Betancur Betancurt Beter Beteta Bethancourt Betrano Better"
            ." Carrizo Carro Cartagena Cartago Cartín Carvajal Carvalho Carvallo Casa Casaca Casafont Casal Casanova"
            ." Casañas Cásares Casas Casasnovas Casasola Cascante Casco Casorla Cassasola Cásseres Castaneda Castañeda"
            ." Castañedas Castaño Castañón Castaños Castelán Castellano Castellanos Castellón Casteñeda Castiblanco"
            ." Castilla Castillo Castro Catania Cateres Catón Cavalceta Cavaller Cavallo Cavanillas Cavazos Cavero"
            ." Cazanga Ceba Ceballos Ceciliano Cedeño Cejudo Celada Celedón Celís Centella Centeno Cepeda Cerceño Cerda"
            ." Cerdas Cerna Cernas Cerón Cerpas Cerros Cervantes Cervilla Céspedes Cevallos Dellanoce Delso Delvo Dengo"
            ." Denis Dennis Detrinidad Devanda Devandas Devoto Dias Díaz Díez Díjeres Díjerez Dimas Dinares Dinarte"
            ." Discua Doblado Dobles Dodero Dalmus Dalmuz Domingo Domínguez Donado Donaire Donato Doña Doñas Donzón"
            ." Dorado Dormos Dormuz Doryan Duar Duares Duarte Duartes Duenas Dueñas Duque Duque Estrada Durall Durán"
            ." Durante Duval Duvall Duverrán Eduarte Egea Elías Eligia Elizalde Elizonda Elizondo Elmaleh Emanuel"
            ." Enrique Enriques Enríquez Eras Erazo Escabar Escalante Escamilla Escarré Escobar Escobedo Escocia"
            ." Escorriola Escosia Escoto Escovar Escribano Escude Escudero España Esparragó Espelerta Espeleta Espinach"
            ." Espinal Espinales Espinar Espino Espinosa Espinoza Espitia Esquivel Esteban Faundez Faune Fava Fazio"
            ." Fermández Fermán Fernandes Fernández Fernando Ferrada Ferrán Ferrando Ferraro Ferreira Ferreiro Ferrer"
            ." Ferrero Ferris Ferro Ferros Fiallos Fictoria Fidalgo Fierro Figueiredo Figuer Figueras Figueres Figueroa"
            ." Filomena Fletes Góchez Godines Godínez Godoy Goic Goicoechea Goicuria Goldenberg Golfín Gomar Gómez Gomis"
            ." Gondres Góndrez Góngora Gonzaga Gonzales González Gonzalo Goñi Gordon Górgona Goyenaga Gracía Gracias"
            ." Gradis Grajal Grajales Grajeda Grana Granada Granados Granda Grandoso Granera Granizo Granja Graña Gras"
            ." Grau Greco Greñas Gridalva Grigoyen Grijalba Grijalda Grijalva Grillo Guadamuz Guadrón Hernández"
            ." Hernando Hernánez Herra Herradora Herrán Herrera Herrero Hevia Hidalgo Hierro Hincapié Hinostroza"
            ." Horna Hornedo Huerta Ibáñez Ibarra Ibarras Icaza Iglesias Ilama Incapié Incer Incera Inceras Inces"
            ." Infante Iracheta Iraheta Irastorza Irias Iribar Irigaray Irola Isaac Isaacs Israel Ivañez Izaba"
            ." Izaguirre Leandro Ledezma Ledo Leitón Leiva Lejarza Lemmes Lemos Lemus Lemuz Leñero León Lépiz Levi"
            ." Leytón Leyva Lezama Lezana Lezcano Lhamas Lieberman Lima Linares Linarte Lindo Lines Líos Lira Lizama"
            ." Lizana Lizano Lizarme Llabona Llach Llado Llamazares Llamosas Llano Lanos Llanten Llaurado Llerena"
            ." Llibre Llinas Llobet Llobeth Llorca Llorella Llorens Llorente Llosent Lloser Llovera Llubere Loáciga"
            ." Loáiciga Loáisiga Loaissa Loaiza Lobo Loeb Loew Loinaz Lombardo Mariño Marot Maroto Marqués Marquez"
            ." Marreco Marrero Marroquín Marsell Marte Martell Martén Martens Martí Martin Martínez Martins Marvez Mas"
            ." Masía Masís Maso Mason Massuh Mastache Mata Matamoros Matarrita Mate Mateo Matera Mateus Matías Matos"
            ." Mattus Mattuz Matul Matus Matute Maurel Maurer Mauricio Mauro Maynard Maynaro Maynart Mayo Mayor Mayorga"
            ." Mayorquín Mayre Mayrena Maza Mazariegos Mazas Mazín Mazón Mazuque Mazure Medal Nasso Navaro Navarrete"
            ." Navarrette Navarro Navas Nayap Nazario Nema Nemar Neyra Nieto Nino Niño Noble Noboa Noel Nogebro Noguera"
            ." Nomberto Nora Noriega Norza Nova Olivas Oliver Olivera Oliverio Olivier Oliviera Olivo Oller Olmeda"
            ." Olmedo Olmo Olmos Omacell Omodeo Ondoy Onetto Oñate Oñoro Oporta Oporto Oquendo Ora Orama Oramas Orantes"
            ." Ordeñana Ordoñes Ordóñez Orduz Oreamuno Oreas Oreiro Orella Orellana Orfila Orias Orios Orjas Orjuela"
            ." Orlich Ormasis Ormeño Orna Ornes Orochena Orocu Orosco Orozco Ortega Ortegón Ortiz Ortuño Orve Osante"
            ." Oseda Passapera Pastor Pastora Pastrán Pastrana Pastrano Patiño Patricio Paut Pauth Pavez Pavón Paz"
            ." Pazmiño Pazos Pedraza Pedreira Pedreiro Pedroza Peinador Peinano Peláez Pellas Pellecer Pena Penabad"
            ." Penado Pendones Penón Penso Peña Peñaloza Peñaranda Peñas Peñate Penzo Peñón Peraldo Perales Peralta"
            ." Peraza Perdomo Perea Perearnau Pereira Pereiras Perera Pereyra Pérez Perezache Pergo Pericón Perla"
            ." Perlaza Pessoa Peynado Peytrequín Pezo Picado Picasso Picavea Pichardo Pico Picón Piedra Piedrafita"
            ." Pila Pilarte Pimente Pina Pinada Pinagel Pinagen"
        );

        return $surnames[rand(0, count($surnames) - 1)];
    }
}
