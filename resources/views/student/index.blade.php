<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>alumnos recibidos</title>
</head>
<body>
    <h1>Alumnos recibidos</h1>

    <!-- Enlace para volver al formulario -->
    <p><a href="{{ route('student.create') }}">Volver al formulario</a></p>

    <!-- Tabla de students -->
    @if (count($students) > 0)
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Modulo</th>
                    <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student['nombre'] }}</td>
                        <td>{{ $student['modulo'] }}</td>
                        <td>{{ $student['calificacion'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se han recibido mensajes aún.</p>
    @endif
</body>
</html>
