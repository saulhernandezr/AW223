export default function Estudiante({estudiante}){
    return(
        /* lista con el objeto estudiante  */
        <li> 
        <strong>{estudiante.nombre}</strong> {" -- "} {estudiante.carrera} 
        <button type="button"> eliminar </button>
        </li> 

    );
}
