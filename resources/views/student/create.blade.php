<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enviar alumno</title>
</head>
<body>
    <h1>Enviar alumno</h1>

    {{-- Mostramos errores de validación --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mostramos mensaje de éxito si existe --}}
    @if (session('status'))
        <div style="color: green;">
            {{ session('status') }}
        </div>
    @endif

    <p>{{ $bienvenida }}</p>

    <p><a href="{{ route('student.index') }}">Ver alumnos enviados</a></p>

    {{-- Formulario --}}
    <form action="{{ route('student.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"><br><br>

        <label for="modulo">Módulo:</label><br>
        <input type="modulo" id="modulo" name="modulo" value="{{ old('modulo') }}"><br><br>

        <label for="calificacion">Calificación:</label><br>
        <input type="calificacion" id="calificacion" name="calificacion" value="{{ old('calificacion') }}"><br><br>


        <button type="submit">Enviar</button>
    </form>
</body>
</html>
