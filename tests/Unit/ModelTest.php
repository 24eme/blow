<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Event;

class ModelTest extends TestCase
{


    public function testModel()
    {
      $this->event = new Event();
      $this->event->setDate('start', '2020-02-01', '09:00');
      $this->event->setDate('end', '2020-02-01', '09:00');
      //dd($this->event->start);
      $this->assertEquals($this->event->start, "2020-02-01T09:00Z");
      $this->assertEquals($this->event->end, "2020-02-01T09:00Z");

      //dd($this->event->convertDate('2020-02-01T09:00Z'));
      //$this->assertEquals();

    }

}
