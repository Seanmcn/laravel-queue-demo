<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AppTest
 */
class AppTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test the dashboard exists and the data has been seeded
     */
    public function testDashboard()
    {
        $this->visit('/')
            ->see('Queue App')
            ->dontSee('please seed the database')
            ->see('Services');
    }

    /**
     * Test adding a customer
     */
    public function testAddCustomer()
    {

        $this->visit('/')
            ->type('Charles', 'citizen_first_name')
            ->type('Darwin', 'citizen_last_name')
            ->press('Submit')
            ->seePageIs('/')
            ->see('Charles Darwin');
    }
}
