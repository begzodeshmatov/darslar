<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    table{
        border: 1px solid black;
    }
    table tr{
        border: 1px solid black;
    }
    table th,td{
        border: 1px solid black;
    }
</style>
</head>
<body>
    <table class="table" cellpadding="10" cellspacing="0">
        <thead>
            <tr align="center">
                <th scope="col">Id</th>
                <th scope="col">F.I.SH</th>
                <th scope="col">Manzil</th>
                <th scope="col">Kitob nomi</th>
                <th scope="col">Fikirlar</th>
                <th scope="col">Tel nomer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $kasb)
                <tr>
                    <td scope="row">{{ $kasb->id }}</td>
                    <td>{{ $kasb->name }}</td>
                    <td>{{ $kasb->email }}</td>
                    <td>{{ $kasb->book_name }}</td>
                    <td>{{ $kasb->surname }}</td>
                    <td>{{ $kasb->tel_raqam }}</td>
                </tr>
            @endforeach
        </tbo>
    </table>
</body>
</html>