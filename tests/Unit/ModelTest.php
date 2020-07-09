<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Event;

class ModelTest extends TestCase
{


    public function testSetDate()
    {
      $this->event = new Event();
      $this->event->setDate('start', '2020-02-01', '09:00');
      $this->event->setDate('end', '2020-02-01', '09:00');
      $this->assertEquals($this->event->start, "2020-02-01T09:00Z");
      $this->assertEquals($this->event->end, "2020-02-01T09:00Z");

    }

    public function testIsPast()
    {
      $this->event= new Event();
      $this->event->start='2020-07-08T18:00';
      $this->assertEquals($this->event->isPassed(),True);

      $this->event->start='2050-01-01T00:00';
      $this->assertEquals($this->event->isPassed(),False);
    }

    public function testConvertDate(){
      $this->event= new Event();
      $this->event->start='2020-06-09T08:00Z';
      $this->assertEquals($this->event->start->convertDate($date),'2020-06-0908:00');
    }

}
