<?
session_start();
include_once('C:/AppServ/www/proyectoADS/moduloVentas/formDatosAlumnoYHorario.php');
class formRegistroAlumno extends formDatosAlumnoYHorario
{
    public function formRegistroAlumnoPagoShow($docIdentidad, $inputNivel, $id, $hora, $inputHorario)
    {
        $this->formDatos(
            'registro',
            'Registro de Alumno y Pago',
            $inputNivel,
            $docIdentidad,
            $hora,
            $inputHorario,
            $id
        );
    }
    public function formUpdateAlumnoPagoShow($respuesta, $inputNivel, $id, $hora, $inputHorario)
    {
        $datoAlumno = $respuesta[0];
        $this->formDatos(
            'update',
            'Actualizar datos del Alumno y registro de Pago',
            $inputNivel,
            $datoAlumno['dni'],
            $hora,
            $inputHorario,
            $id,
            $datoAlumno['nombre_completo'],
            $datoAlumno['celular'],
            $datoAlumno['correo'],
            $datoAlumno['cumple']
        );
    }
}
?>