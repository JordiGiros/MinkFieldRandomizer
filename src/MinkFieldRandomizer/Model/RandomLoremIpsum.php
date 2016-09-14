<?php

namespace MinkFieldRandomizer\Model;

use Exception;
use MinkFieldRandomizer\Filter\FilterInterface;

class RandomLoremIpsum implements FilterInterface
{
    /**
     * @param $params
     *
     * @return mixed
     * @throws \Exception
     * @internal param $value
     */
    public function filter($params)
    {
        if (count($params) > 1) {
            throw new Exception(
                "RandomLoremIpsum accepts at most a parameter, the number of paragraphs in the string"
            );
        }
        if (empty($params)) {
            $params = [2];
        }

        $paragraphs = $params[0];

        $text = explode(
            " ",
            "lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor"
            . " incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam quis"
            . " nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat"
            . " Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu"
            . " fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa"
            . " qui officia deserunt mollit anim id est laborum at vero eos et accusamus et iusto"
            . " odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti"
            . " quos dolores et quas molestias excepturi sint occaecati cupiditate non provident"
            . " similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum"
            . " fuga et harum quidem rerum facilis est et expedita distinctio Nam libero tempore cum"
            . " soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat"
            . " facere possimus omnis voluptas assumenda est omnis dolor repellendus Temporibus autem"
            . " quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates"
            . " repudiandae sint et molestiae non recusandae Itaque earum rerum hic tenetur a sapiente"
            . " delectus ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus"
            . " asperiores repellat"
        );

        $finalText = [];
        for ($paragraphNumber = 0; $paragraphNumber < $paragraphs; $paragraphNumber++) {
            $phrases = rand(3, 5);
            $words = rand(4, 8);

            $phrasesText = [];
            for ($phaseNumber = 0; $phaseNumber < $phrases; $phaseNumber++) {
                $comas = rand(2, 4);
                $comasText = [];
                for ($comasNumber = 0; $comasNumber < $comas; $comasNumber++) {
                    $wordsText= [];
                    for ($wordNumber = 0; $wordNumber < $words; $wordNumber++) {
                        $wordsText[] = $text[rand(0, count($text) - 1)];
                    }
                    $comasText[] = implode(" ", $wordsText);
                }
                $comasText[0] = ucfirst($comasText[0]);
                $phrasesText[] = implode(", ", $comasText) . ".";
            }
            $finalText[] = implode("\n", $phrasesText);
        }
        return implode("", $finalText);
    }
}
