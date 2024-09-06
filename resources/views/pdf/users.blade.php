<!DOCTYPE html>
<html>
<head>
    <title>baza List</title>
</head>
<body>
    <h1>baza List</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Muallif</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($baza as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->name }}</td>
                <td>{{ $b->muallif }}</td>
                <td>
                    <img src="images/{{ $b->image }}" alt="" width="50"
                                                height="50">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>