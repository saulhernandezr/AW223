function Buscador({ busqueda, cambiarBusqueda }) {
  return (
    <div className="buscador">
      <input
        type="text"
        placeholder="buscar destino o país "
        value={busqueda}
        onChange={(e) => cambiarBusqueda(e.target.value)}
      />
    </div>
  );
}

export default Buscador;