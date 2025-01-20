<x-app-layout>
    <div style="display: flex; flex-wrap: wrap; gap: 20px; padding: 20px;">
        <!-- Left Side: Dynamic Schedules -->
        <div style="flex: 2; min-width: 300px; border: 1px solid #ccc; padding: 20px; border-radius: 5px; background-color: #f9f9f9;">
            @foreach($schedules as $index => $schedule)
            <div style="margin-bottom: 20px;">
                <h3 style="margin-bottom: 10px; font-size: 18px; font-weight: bold;">
                    {{ \Carbon\Carbon::parse($schedule->date)->format('F d, Y') }}
                </h3>
                <span style="display: inline-block; margin-bottom: 10px; font-size: 14px; background-color: #e0e0e0; padding: 5px 10px; border-radius: 5px;">
                    {{ \Carbon\Carbon::parse($schedule->date)->format('l') }}
                </span>
                <p style="margin-bottom: 10px; font-size: 14px; color: #333;">
                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                </p>

                <!-- Display Time Slots -->
                <div style="margin-top: 10px; display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">
                    @if(!empty($timeSlots[$index]))
                        @foreach($timeSlots[$index] as $slot)
                        <span style="display: inline-block; font-size: 14px; background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px; text-align: center;">
                            {{ $slot }}
                        </span>
                        @endforeach
                    @else
                        <span style="font-size: 14px; color: #888;">No slots available</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Right Side: Appointment Form -->
        <div style="flex: 1; min-width: 300px; border: 1px solid #ccc; padding: 20px; border-radius: 5px; background-color: #fff;">
            <form action="#" method="POST" onsubmit="return validateForm();">
                <div style="margin-bottom: 15px;">
                    <label for="schedule_id" style="display: block; font-size: 14px; font-weight: bold; margin-bottom: 5px;">Select Schedule:</label>
                    <select name="schedule_id" id="schedule_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        @foreach($schedules as $schedule)
                            <option value="{{ $loop->index }}">
                                {{ \Carbon\Carbon::parse($schedule->date)->format('F d, Y') }} ({{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="time_slot" style="display: block; font-size: 14px; font-weight: bold; margin-bottom: 5px;">Select Time Slot:</label>
                    <select name="time_slot" id="time_slot" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                        <!-- Time slots will be dynamically populated here -->
                    </select>
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="patient_name" style="display: block; font-size: 14px; font-weight: bold; margin-bottom: 5px;">Patient Name:</label>
                    <input type="text" name="patient_name" id="patient_name" placeholder="Enter Patient Name" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                </div>
                <div style="margin-bottom: 15px;">
                    <label for="patient_contact" style="display: block; font-size: 14px; font-weight: bold; margin-bottom: 5px;">Contact:</label>
                    <input type="text" name="patient_contact" id="patient_contact" placeholder="Enter Contact" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                </div>
                <button type="submit" style="width: 100%; padding: 10px; background-color: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Book Appointment</button>
            </form>
        </div>
    </div>

    <script>
        const schedules = @json($timeSlots);

        // Populate the time slots based on selected schedule
        document.getElementById('schedule_id').addEventListener('change', function() {
            const selectedScheduleIndex = this.value;
            const timeSlotSelect = document.getElementById('time_slot');

            // Clear existing options
            timeSlotSelect.innerHTML = '';

            // Populate new options
            schedules[selectedScheduleIndex].forEach(slot => {
                const option = document.createElement('option');
                option.value = slot;
                option.textContent = slot;
                timeSlotSelect.appendChild(option);
            });
        });

        // Trigger the change event to load the initial time slots
        document.getElementById('schedule_id').dispatchEvent(new Event('change'));

        // Form validation
        function validateForm() {
            const name = document.getElementById('patient_name').value.trim();
            const contact = document.getElementById('patient_contact').value.trim();

            if (!name || !contact) {
                alert('Please fill in all required fields.');
                return false;
            }
            return true;
        }
    </script>
</x-app-layout>
