function Navbar({ cantidadFavoritos, mostrarFavoritos, cambiarVista }) {
  return (

    <nav className="navbar">
      <h2>buscar</h2>

{/* boton favoritos */}
      <button onClick={cambiarVista}>
        {mostrarFavoritos ? "Ver destinos" : `♡ Favoritos (${cantidadFavoritos})`}
      </button>
    </nav>
  );
}
export default Navbar;
