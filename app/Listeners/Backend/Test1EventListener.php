<?php
namespace App\Listeners\Backend;

/**
 * Class Test1EventListener.
 */
/**
 * Class Test1Created.
 */
class Test1EventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Test1 Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Test1  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Test1 Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Test1\Test1Created::class,
            'App\Listeners\Backend\Test1EventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Test1\Test1Updated::class,
            'App\Listeners\Backend\Test1EventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Test1\Test1Deleted::class,
            'App\Listeners\Backend\Test1EventListener@onDeleted'
        );
    }
}
