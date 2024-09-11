<!DOCTYPE html>
<html>

<head>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Reporte de Consultorios</h2>
    <table>
        <thead>
            <tr>
                <th>Consultorio</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha de asignación</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignments as $officeAssignment)
                <tr>
                    <td>{{ $officeAssignment->office->name }}</td>

                    <td>{{ $officeAssignment->user->person->first_name }}
                        {{ $officeAssignment->user->person->last_name }}</td>
                    <td> {{ $officeAssignment->specialty->name }}</td>
                    <td>{{ $officeAssignment->created_at->format('Y-m-d') }}</td>
                    <td>{{ $officeAssignment->office->active == 0 ? 'Ocupado' : 'Disponible' }}</td>

                </tr>
            @endforeach
            @foreach ($offices as $office)
                <tr>
                    <td>{{ $office->name }}</td>
                    <td></td>
                    <td></td>
                    <td>{{ $office->active == 0 ? 'Ocupado' : 'Disponible' }}</td>



                </tr>
            @endforeach

            {{-- <td>{{ $offices->name }}</td> --}}
        </tbody>
    </table>
</body>

</html>
