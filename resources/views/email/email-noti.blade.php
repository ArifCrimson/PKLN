<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Permohonan</title>
</head>

<body>
    <h1>MAKLUMAN STATUS PERMOHONAN PERCUTIAN BAGI {{$permohonan->profiles->no_kp}}</h1>
    <p>{{ $permohonan->profiles->name }},</p>
    <p>Butiran permohonan telah dikemaskini</p>
    <ul>
        <li><strong>Nama : </strong>{{ $permohonan->profiles->name }}</li>
        <li><strong>IC : </strong>{{ $permohonan->profiles->no_kp }}</li>
        <li><strong>Status : </strong>{{ $permohonan->status_name->name }}</li>
        @if ($permohonan->catatan_pelulus !== null)
            <li><strong>Catatan Pelulus : </strong> {{ $permohonan->catatan_pelulus }} </li>
        @elseif ($permohonan->catatan_urusetia !== null)
            <li><strong>Catatan Urusetia : </strong> {{ $permohonan->catatan_urusetia }} </li>
        @endif
    </ul>
    <p>Terima Kasih,</p>
</body>

</html>
