<?
    class controlAlumno
    {
        public function verificarAlumno($docIdentidad,$inputNivel,$id,$hora,$inputHorario)
        {
            session_start();
            include_once("../modelos/alumnos.php");
            $objUsuario = new alumnos();
            $respuesta = $objUsuario -> validarAlumnos($docIdentidad);
            if(count($respuesta)>0)
            {
                include_once("./formRegistroAlumno.php");
                $objUsuarioPriv = new formRegistroAlumno();
                $objUsuarioPriv -> formUpdateAlumnoPagoShow($respuesta,$inputNivel,$id,$hora,$inputHorario);            
            }
            else
            {   
                include_once("./formRegistroAlumno.php");
                $objUsuarioPriv = new formRegistroAlumno();
                $objUsuarioPriv -> formRegistroAlumnoPagoShow($docIdentidad,$inputNivel,$id,$hora,$inputHorario);
              
            }
        }

        public function agregarAlumno($nivel, $correo, $celular, $nombreCompleto, $documentoIdentidad, $idHorario, $cumpleanos)
        {
            session_start();
            include_once("../modelos/alumnos.php");
            $objUsuario = new alumnos();
            $respuesta = $objUsuario -> insertarAlumno($nombreCompleto, $documentoIdentidad, $celular, $correo, $cumpleanos, $nivel, $idHorario);
            return $respuesta;
        }

        public function actualizarAlumno($nombreCompleto, $documentoIdentidad, $celular, $correo, $cumpleanos, $nivel,$idHorario)
        {
            session_start();
            include_once("../modelos/alumnos.php");
            $objUsuario = new alumnos();
            $respuesta = $objUsuario -> actualizarAlumno($nombreCompleto, $documentoIdentidad, $celular, $correo, $cumpleanos, $nivel,$idHorario);
            return $respuesta;
        }
    }
?>