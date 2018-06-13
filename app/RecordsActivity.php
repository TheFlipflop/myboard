<?php

namespace App;


trait RecordsActivity
{

    protected static function bootRecordsActivity()
    {
        if(auth()->guest()) return;

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }

    }

    protected static function getActivitiesToRecord()
    {
        return ['created'];
    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $event . '_' . strtolower(class_basename($this)),
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }
}