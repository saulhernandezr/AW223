/* importaciones */
import Destino from "./components/Destino";
import "./App.css";
import { useState } from "react";
import Navbar from "./components/Navbar";
import Buscador from "./components/Buscador";


export default function App(){
  /* lista de lugares*/
 const destinos = [
  {
    id: 1,
    nombre: "Cancún",
    pais: "México",
    categoria: "Playa",
    precio: 5500,
    descripcion: "disfruta de playas de arena blanca, aguas cristalinas y hermosos paisajes.",
    imagen: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYbavr9dtEdSdcxjNqR0WHTPmqwQXXiUhRZXQBCI6HiA&s=10",
  },
  {
    id: 2,
    nombre: "París",
    pais: "Francia",
    categoria: "Ciudad",
    precio: 18000,
    descripcion: "conoce la torre eiffel y sus museos.",
    imagen: "https://thumb.wikimedia.org/wikipedia/commons/thumb/4/4b/La_Tour_Eiffel_vue_de_la_Tour_Saint-Jacques%2C_Paris_ao%C3%BBt_2014_%282%29.jpg/330px-La_Tour_Eiffel_vue_de_la_Tour_Saint-Jacques%2C_Paris_ao%C3%BBt_2014_%282%29.jpg?utm_source=es.wikipedia.org&utm_campaign=parser&utm_content=thumbnail",
  },
  {
    id: 3,
    nombre: "Tokio",
    pais: "Japón",
    categoria: "Ciudad",
    precio: 25000,
    descripcion: "Una ciudad moderna para visitar y ver la tradición japonesa",
    imagen: "https://content-viajes.nationalgeographic.com.es/medio/2024/09/03/tokio_133ce43a_1284581217_240903122054_1280x854.jpg",
  },
  {
    id: 4,
    nombre: "Machu Picchu",
    pais: "Perú",
    categoria: "Naturaleza",
    precio: 12000,
    descripcion: "Antiguas construcciones incas rodeadas de montañas.",
    imagen: "https://content.r9cdn.net/rimg/simg/2048/45618.jpg?width=1366&height=768&crop=true",
  },
  {
    id: 5,
    nombre: "Roma",
    pais: "Italia",
    categoria: "Ciudad",
    precio: 16500,
    descripcion: "Visita el Coliseo.",
    imagen: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPW-TzB9JDtx2IWyGLeP0GxLdV2EC-eZOG3yy6g3m9sQ&s=10",
  },
  {
    id: 6,
    nombre: "Bali",
    pais: "Indonesia",
    categoria: "Playa",
    precio: 22000,
    descripcion: "visita las playas tropicales de Indonesia",
    imagen: "https://cdn.getyourguide.com/image/format=avif%2Cfit=cover%2Cgravity=auto%2Cquality=60/dam/BCC-2025-EXPLORER-BALI-BEACHES-HEADER_MOBILE.jpg",
  }
];
  
/* estados para busquedas, favoritos y categorias */
  const [busqueda, setBusqueda] = useState("");
  const [favoritos, setFavoritos] = useState([]);
  const [categoria, setCategoria] = useState("Todos");
  const [mostrarFavoritos, setMostrarFavoritos] = useState(false);


/* quitar o agregar favoritos */
  const cambiarFavorito = (id) => {

    if (favoritos.includes(id)) {

      setFavoritos(favoritos.filter((favorito) => favorito !== id));

    } else {

      setFavoritos([...favoritos, id]);

    }

  };


  const cambiarVista = () => {
    setMostrarFavoritos(!mostrarFavoritos);
  };

  const destinosFiltrados = destinos.filter((destino) => {
    const coincideBusqueda =
      destino.nombre.toLowerCase().includes(busqueda.toLowerCase()) ||
      destino.pais.toLowerCase().includes(busqueda.toLowerCase());
    const coincideCategoria =
      categoria === "Todos" || destino.categoria === categoria;
    const coincideFavorito =
      !mostrarFavoritos || favoritos.includes(destino.id);

    return coincideBusqueda && coincideCategoria && coincideFavorito;
  });



  return(
    /* main */
    <main className="contenedor">
      <h1>Agencia de viajes</h1>


      <Navbar
        cantidadFavoritos={favoritos.length}
        mostrarFavoritos={mostrarFavoritos}
        cambiarVista={cambiarVista}
      />
        <Buscador
          busqueda={busqueda}
          cambiarBusqueda={setBusqueda}
        />
        <div className="categorias">

          {["Todos", "Playa", "Ciudad", "Naturaleza"].map((tipo) => (

            <button
              key={tipo}
              className={categoria === tipo ? "categoria-activa" : ""}
              onClick={() => setCategoria(tipo)}
            >
              {tipo}
            </button>
          ))}
        </div>

      <h2> sitios que visitar</h2>
        <div className="contenedor-tarjetas">
          {destinosFiltrados.length > 0 ? (
            destinosFiltrados.map((destino) => (
              <Destino
                key={destino.id}
                destino={destino}
                esFavorito={favoritos.includes(destino.id)}
                cambiarFavorito={cambiarFavorito}
              />
            ))
          ) : (

            <p className="sin-resultados">
              No se encontraron destinos.
            </p>

          )}
        </div>

    </main>





  );
}

