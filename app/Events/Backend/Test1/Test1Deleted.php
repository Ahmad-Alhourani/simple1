<?php namespace App\Events\Backend\Test1;

use Illuminate\Queue\SerializesModels;
/**
 * Class Test1Deleted.
 */

class Test1Deleted
{
    use SerializesModels;
    /**
     * @var
     */

    public $test1;

    /**
     * @param $test1
     */
    public function __construct($test1)
    {
        $this->test1 = $test1;
    }
}
