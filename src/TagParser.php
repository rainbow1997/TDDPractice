<?php

namespace Smost\Jargon;

class TagParser
{
    public function parse(string $tags): array
    {
//        return [$tags];
//        return explode(', ', $tags);
//        return preg_split('/, ?/',$tags);//look for comma in the first then maybe have space
                                                // or not(use ? for unnecessary) pattern starts with: / and end with /
//          return $tags =  preg_split('/[,|] ?/', $tags);//(pattern not words*)starts with comma or pipe and then maybe has space or not
//          return array_map(fn($tag) => trim($tag) ,$tags);
           return preg_split('/ ?[,|] ?/', $tags);
    }
}