<?php

namespace App\Http\Traits;

use App\Models\CustomJob;
use App\Events\ProcessNextJob;
use App\Notifications\TestMail;
use App\Events\ProcessNextFailedJob;
use Illuminate\Support\Facades\Notification;

trait CustomJobTrait
{
    public function createJob($data)
    {
        return CustomJob::create($data);
    }

    public function updateJobSattus($id, $status)
    {
        $job = CustomJob::find($id);
        return $job;
    }

    public function getDataFromQueueAndProcess()
    {
        $job  = CustomJob::whereStatus('in_queue')->lockForUpdate()->first();
        if ($job) {
            
            $job->status = 'processing';
            $job->save();

            try {
                Notification::route('mail', $job->payload->email)->notify(new TestMail());
                $job->delete();
            } catch (\Exception $e) {
                $job->status = 'failed';
                $job->exception = $e->getMessage();
                $job->save();
            }
            ProcessNextJob::dispatch();
        } else {
            return 0;
        }
    }

    public function processFailedJob()
    {
        $job  = CustomJob::whereStatus('failed')->whereTried(0)->lockForUpdate()->first();
        if ($job) {

            $job->status = 'retrying';
            $job->save();

            try {
                Notification::route('mail', $job->payload->email)->notify(new TestMail());
                $job->delete();
            } catch (\Exception $e) {
                $job->status = 'failed';
                $job->tried = 1;
                $job->exception = $e->getMessage();
                $job->save();
            }
            ProcessNextFailedJob::dispatch();
        } else {
            return 0;
        }
    }
}
