<?php

namespace Tests;

use Smost\Jargon\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    //data like : product,general
    protected TagParser $parser;

    public function setup(): void //based on TestCase class it's run over all over the single test
    {
        //ARRANGE
        $this->parser = new TagParser();
    }
    //form of use dataprovider in phpunit
    /**
     * @dataProvider  tagsProvider
     */
    public function testItParsesTags($input, $expected)
    {
        $result = $this->parser->parse($input);
        $this->assertSame($expected, $result);
    }
    public static function tagsProvider()
    {
        return [
            ['personal', ['personal'] ],
            ['personal, money, family', ['personal', 'money', 'family'] ],
            ['personal,money,family', ['personal','money','family'] ],
            ['personal|money|family|shop', ['personal', 'money', 'family', 'shop'] ]

        ];
    }

//    public function testItParsesASingleTag()
//    {
//        //ACT
//        $result = $this->parser->parse('personal');
//        $expectedOutput = ['personal'];
//        //ASSERT
//        $this->assertSame($expectedOutput, $result);
//
//    }

//    public function testItParsesACommaSeparatedListOfTags()
//    {
//        //ACT
//        $result = $this->parser->parse('personal, money, family');
//        $expectedOutput = ['personal', 'money', 'family'];
//        //ASSERT
//        $this->assertSame($expectedOutput, $result);
//
//    }

//    public function testCommasAreOptional()
//    {
//        //ACT
//        $result = $this->parser->parse('personal,money,family');
//        $expectedOutput = ['personal', 'money', 'family'];
//        //ASSERT
//        $this->assertSame($expectedOutput, $result);
//
//    }

//    public function testItParsesAPipeSeparatedListOfTags()
//    {
//        //ACT
//        $result = $this->parser->parse('personal|money|family|shop');
//        $expectedOutput = ['personal', 'money', 'family', 'shop'];
//        //ASSERT
//        $this->assertSame($expectedOutput, $result);
//    }
}