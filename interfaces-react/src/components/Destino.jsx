export default function Destino({ destino, esFavorito, cambiarFavorito }){


  
    return(
        /* lista con el objeto estudiante */
        <div className="tarjeta">
              <img
        src={destino.imagen}
        alt={destino.nombre}
        className="imagen-destino"
      />

      <div className="contenido-tarjeta">

        <span className="categoria">
          {destino.categoria}
        </span>

        <h3>{destino.nombre}, {destino.pais}</h3>

        <p>{destino.descripcion}</p>

        <h4>
          Desde ${destino.precio.toLocaleString("es-MX")} MXN
        </h4>

        <button
          className={esFavorito ? "btn-favorito activo" : "btn-favorito"}
          onClick={() => cambiarFavorito(destino.id)}
        >
          {esFavorito ? "♥ Quitar favorito" : "♡ Agregar favorito"}
        </button>

      </div>
</div>
    );
}
