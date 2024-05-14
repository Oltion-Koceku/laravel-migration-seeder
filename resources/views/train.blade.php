@extends('layout.main')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">slug</th>
        <th scope="col">agency</th>
        <th scope="col">departure_station</th>
        <th scope="col">arrival_station</th>
        <th scope="col">departure_time</th>
        <th scope="col">arrival_time</th>
        <th scope="col">train_number</th>
        <th scope="col">number_of_carriages</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($trains as $train)
        <tr>
            <td>{{ $train->id }}</td>
            <td>{{ $train->slug }}</td>
            <td>{{ $train->agency }}</td>
            <td>{{ $train->departure_station }}</td>
            <td>{{ $train->arrival_station }}</td>
            <td>{{ $train->departure_time }}</td>
            <td>{{ $train->arrival_time }}</td>
            <td>{{ $train->train_number }}</td>
            <td>{{ $train->number_of_carriages}}</td>

      </tr>
    @endforeach


</tbody>
</table>
{{ $trains->links('pagination::bootstrap-5') }}

@endsection
