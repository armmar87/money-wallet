<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">DOB</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->firstname }}</td>
                    <td>{{ $data->lastname }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->dob }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
