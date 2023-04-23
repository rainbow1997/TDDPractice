<?php

namespace Tests;
use Smost\Jargon\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    //data like : product,general

    public function testItParsesASingleTag()
    {
        $parser = new TagParser;
        $result = $parser->parse('personal');
        $expectedOutput = ['personal'];
        $this->assertSame($expectedOutput, $result);

    }
    public function testItParsesACommaSeparatedListOfTags()
    {
        $parser = new TagParser;
        $result = $parser->parse('personal, money, family');
        $expectedOutput = ['personal','money','family'];
        $this->assertSame($expectedOutput, $result);

    }
    public function testCommasAreOptional()
    {
        $parser = new TagParser;
        $result = $parser->parse('personal,money,family');
        $expectedOutput = ['personal','money','family'];
        $this->assertSame($expectedOutput, $result);

    }
    public function testItParsesAPipeSeparatedListOfTags()
    {
        $parser = new TagParser;
        $result = $parser->parse('personal|money|family|shop');
        $expectedOutput = ['personal','money','family','shop'];
        $this->assertSame($expectedOutput, $result);
    }
}