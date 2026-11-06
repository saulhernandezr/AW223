/* importaciones */
import Estudiante from "./components/estudiante";
import "./App.css";


export default function App(){
  /* listas de estudiantes ya hecha */
  const estudiantes =[
  {id:1,nombre:"saul",carrera:"sistemas"},
  {id:2,nombre:"juan",carrera:"industrial"},
  {id:3,nombre:"maria",carrera:"civil"},
  ];

  return(
    /* main */
    <main className="contenedor">
      <h1>registro de estudiantes</h1>
      {/* formulario para agregar nuevos estudiantes */}
      <form>
        <input type="text" placeholder="nombre"/>
        <input type="text" placeholder="carrera"/>
        <button type="button">Agregar</button>
      </form>

      <h2> estudiantes registrados</h2>
      {/* lista de estudiantes  */}
      <ul>
        {estudiantes.map((estudiante) => (
          <Estudiante key={estudiante.id} estudiante={estudiante} 
          />
        ))
        }
      </ul>
      {/* hara un conteo de estudiantes */}
      <p>total de estudiantes: {estudiantes.length}</p>
    </main>
  );
}

