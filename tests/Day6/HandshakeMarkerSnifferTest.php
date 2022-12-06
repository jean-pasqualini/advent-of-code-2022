<?php

namespace Day6;

use App\Day6\HandshakeMarkerSniffer;
use PHPUnit\Framework\TestCase;

class HandshakeMarkerSnifferTest extends TestCase
{
    public function provideSniff4()
    {
        return [
            ['bvwbjplbgvbhsrlpgdmjqwftvncz', 5],
            ['nppdvjthqldpwncqszvftbrmjlhg', 6],
            ['nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg', 10],
            ['zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw', 11],
        ];
    }

    public function provideSniff14()
    {
        return [
            ['mjqjpqmgbljsphdztnvjfqwrcgsmlb', 19],
            ['bvwbjplbgvbhsrlpgdmjqwftvncz', 23],
            ['nppdvjthqldpwncqszvftbrmjlhg', 23],
            ['nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg', 29],
            ['zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw', 26],
        ];
    }

    /**
     * @dataProvider provideSniff4
     */
    public function testSniff4(string $stream, int $position)
    {
        $sniffer = new HandshakeMarkerSniffer();
        $this->assertEquals($position, $sniffer->sniff($stream));
    }

    /**
     * @dataProvider provideSniff14
     */
    public function testSniff14(string $stream, int $position)
    {
        $sniffer = new HandshakeMarkerSniffer();
        $this->assertEquals($position, $sniffer->sniff($stream, 14));
    }
}