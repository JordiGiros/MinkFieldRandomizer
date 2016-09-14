<?php

namespace MinkFieldRandomizer\Model;

use Exception;
use MinkFieldRandomizer\Filter\FilterInterface;

class RandomName implements FilterInterface
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
            throw new Exception("RandomName does not accept parameters");
        }

        $names    = explode(
            " ",
            "Isabella Daniel Olivia David Alexis Gabriel Sofía Benjamín Victoria Samuel Amelia Lucas Alexa"
            . " Ángel Julia José Camila Adrián Alexandra Sebastián Maya Xavier Andrea Juan Ariana Luis María"
            . " Diego Eva Óliver Angelina Carlos Valeria Jesús Natalia Alex Isabel MaxSara Alejandro Liliana"
            . " Antonio Adriana Miguel Juliana Víctor Gabriela Joel Daniela Santiago Valentina Elías Lila Iván"
            . " Vivian Óscar Nora Leonardo Ángela Eduardo Elena Alan Clara Nicolás Eliana Jorge Alana Omar"
            . " Miranda Paúl Amanda Andrés Diana Julián Ana Josué Penélope Román Aurora Fernando"
            . " Alexandría Javier Lola Abraham Alicia Ricardo Amaya Francisco Alexia César Jazmín Mario"
            . " Mariana Manuel Alina Édgar Lucía Alexis Fátima Israel Ximena Mateo Laura Héctor Cecilia Sergio"
            . " Alejandra Emiliano Esmeralda Simón Verónica Rafael Daniella Martín Miriam Marco Carmen Roberto"
            . " Iris Pedro Guadalupe Emanuel Selena Abel Fernanda Rubén Angélica Fabián Emilia Emilio Lía Joaquín"
            . " Tatiana Marcos Mónica Lorenzo Carolina Armando Jimena Adán Dulce Raúl Talía Julio Estrella Enrique"
            . " Brenda Gerardo Lilian Pablo Paola Jaime Serena Saúl Celeste Esteban Viviana Gustavo Elisa Rodrigo"
            . " Melina Arturo Gloria Mauricio Claudia Orlando Sandra Hugo Marisol Salvador Asia Alfredo Ada"
            . " Maximiliano Rosa Ramón Isabela Ernesto Regina Tobías Elsa Abram Perla Noé Raquel Guillermo"
            . " Virginia Ezequiel Patricia Lucián Linda Alonzo Marina Felipe Leila Matías América Tomás Mercedes"
        );

        return $names[rand(0, count($names) - 1)];
    }
}
