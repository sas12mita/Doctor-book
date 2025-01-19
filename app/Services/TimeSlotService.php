<?php
namespace App\Services;

use Carbon\Carbon;  // Import Carbon class

class TimeSlotService
{
    public function generateTimeSlots($startTime, $endTime)
    {
        // Convert start and end times to Carbon instances
        $startTime = Carbon::parse($startTime);
        $endTime = Carbon::parse($endTime);

        // Example logic to generate time slots between start and end times
        $slots = [];
        $currentTime = $startTime;

        while ($currentTime < $endTime) {
            $slots[] = $currentTime->format('H:i');  // Format the time as a string (e.g., 14:00)
            $currentTime = $this->incrementTimeByInterval($currentTime); // Add interval logic
        }

        return $slots;
    }

    private function incrementTimeByInterval($time)
    {
        // Increment time by 30 minutes
        return $time->addMinutes(30);
    }
}

