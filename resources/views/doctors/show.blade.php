<x-app-layout>
    <div style="display: flex; justify-content: center; padding: 20px; background-color: #f4f4f4;">
        <div style="width: 80%; max-width: 1000px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                @forelse($schedules as $schedule)
                <div style="flex: 1 1 calc(50% - 20px); max-width: calc(50% - 20px); border: 1px solid #ccc; padding: 20px; border-radius: 8px; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; justify-content: space-between; min-height: 300px;">
                    <h3 style="margin-bottom: 10px; font-size: 18px; font-weight: bold; text-align: center;">
                        {{ \Carbon\Carbon::parse($schedule->date)->format('F d, Y') }}
                    </h3>
                    <span style="display: block; margin-bottom: 10px; font-size: 14px; background-color: #e0e0e0; padding: 5px 10px; border-radius: 5px; text-align: center;">
                        {{ \Carbon\Carbon::parse($schedule->date)->format('l') }}
                    </span>
                    <p style="margin-bottom: 10px; font-size: 14px; color: #333; text-align: center;">
                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                    </p>

                    <!-- Display Time Slots -->
                    <div style="margin-top: 10px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">
                        @if(!empty($timeSlots[$schedule->id]))
                        @foreach($timeSlots[$schedule->id] as $slot)
                        <span style="display: inline-block; font-size: 14px; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px; text-align: center;">
                            {{ $slot }}
                        </span>
                        @endforeach
                        @else
                        <span style="font-size: 14px; color: #888;">No slots available</span>
                        @endif
                    </div>

                    <!-- Book Appointment Button -->
                     <br>
                    <div style="margin-top: auto; display: flex; justify-content: center;">
                        <a href="{{ route('appointments.create', ['schedule_id' => $schedule->id, 'doctor_id' => $doctor->id]) }}"
                            style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; display: inline-block; text-align: center; font-weight: bold;">
                            Book Appointment
                        </a>
                    </div>
                </div>
                
                @empty
                <p style="font-size: 14px; color: #888; text-align: center; width: 100%;">No schedules available</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
