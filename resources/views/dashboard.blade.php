<x-app-layout>
<div>
    @if(Auth::check() && Auth::user()->role)
        @switch(Auth::user()->role)
            @case('admin')
                @include('dashboards.admin')
                @break

            @case('patient')
                @include('dashboards.patient')
                @break

            @case('doctor')
                @include('dashboards.doctor')
                @break

            @default
                <p>Unauthorized access</p>
        @endswitch
    @else
        <p>You are not authenticated.</p>
    @endif
</div>

</x-app-layout>
