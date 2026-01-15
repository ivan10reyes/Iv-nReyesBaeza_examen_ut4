<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Student;

class StudentController extends Controller
{
    // Muestra el formulario
    public function create()
    {
        $bienvenida = "Bienvenido al formulario de alumnos";

        // Retornamos la vista del formulario
        return view('student.create', compact('bienvenida'));
    }

    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $datos = $request->validate([
            'nombre' => 'required|string|max:50',
            'modulo' => 'required|string|max:50',
            'calificacion' => 'required|integer|max:50',
        ]);

        // Crear una nueva instancia del modelo Alumno
        $student = new Student();   
        $student->nombre = $datos['nombre'];
        $student->modulo = $datos['modulo'];
        $student->calificacion = $datos['calificacion'];
        
        // Guardar el alumno en la base de datos
        $student->save();                     

        // Redirigimos de vuelta al formulario con un mensaje de éxito. Es un helper de Laravel que crea una respuesta de redirección. Es un helper de Laravel que crea una respuesta de redirección.
        // with('status', '...') añade un dato temporal a la sesión que estará disponible solo en la siguiente solicitud. Este dato se conoce como mensaje flash.
        return redirect()->route('student.create')->with('status', 'alumno guardado correctamente.');
    }

    public function index()
    {
        $students = Student::all();

        // Pasamos los students a la vista
        // compact('students') crea un array con la variable $students
        return view('student.index', compact('students'));
    }

}