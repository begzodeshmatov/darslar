<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1 style="text-align:center;">Kitoblar ro'yxatini PDF ko'rinishi</h1>

    <table border="1" cellspacing="0" cellpadding="20" width="100%">
        <thead>
            <tr align="center">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Kitob nomi</th>
                <th scope="col">Tel nomer</th>
            </tr>
        </thead>
        <tbody>
        @if ($books)
                <tr align="center">
                    <td scope="row">{{ $books->id }}</td>
                    <td>{{ $books->name }}</td>
                    <td>{{ $books->surname }}</td>
                    <td>{{ $books->email }}</td>
                    <td>{{ $books->book_name }}</td>
                    <td>{{ $books->tel_raqam }}</td>
                
                </tr>

                @endif
        </tbody>
    </table>
</body>
</html>