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

    public function testmoreThan3hour()
    {
      $this->event= new Event();
      $this->event->start='2020-06-09T08:00Z';
      $this->event->end='2020-06-09T13:00Z';
      $this->assertEquals($this->event->moreThan3hour(),True);
      $this->event->start='2020-06-09T08:00Z';
      $this->event->end='2020-06-09T09:00Z';
      $this->assertEquals($this->event->moreThan3hour(),False);
    }

    public function testdatesCoherent()
    {
      $this->event= new Event();
      $this->event->start='2020-06-09T08:00Z';
      $this->event->end='2020-06-09T09:00Z';
      $this->assertEquals($this->event->datesCoherent(),True);
      $this->event->start='2020-06-09T08:00Z';
      $this->event->end='2020-06-09T07:00Z';
      $this->assertEquals($this->event->datesCoherent(),False);
    }

    public function testIsPast()
    {
      $this->event= new Event();
      $this->event->start='2020-07-08T18:00Z';
      $this->assertEquals($this->event->isPassed(),True);

      $this->event->start='2050-01-01T00:00Z';
      $this->assertEquals($this->event->isPassed(),False);
    }

    public function testisReserved()
    {
      //Dans le data seeder il y a un event à la date du 2020-06-08T07:00Z au 2020-06-08T09:00Z à la resource 1
      $this->event=new Event();
      $this->event->start='2020-06-08T07:00Z';
      $this->event->end='2020-06-08T09:00Z';
      $this->event->resourceId='1';
      $this->assertEquals($this->event->isReserved(),False);
    }
    isReservedUpdate()
    {
      
    }

}
