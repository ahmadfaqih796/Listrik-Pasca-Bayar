import { Outlet ,Link } from "react-router-dom"

function Header(){
    const id = 10;
  return (
    <>
    <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
  <div className="container-fluid">
    <a className="navbar-brand" href="#">Navbar</a>
    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span className="navbar-toggler-icon"></span>
    </button>
    <div className="collapse navbar-collapse" id="navbarNav">
      <ul className="navbar-nav">
        <li className="nav-item">
        <Link className="nav-link active" to="/">Beranda</Link>
        </li>
        <li className="nav-item">
        <Link className="nav-link" to={`/about/${id}`}>About</Link>
        </li>
      </ul>
    </div>
  </div>
</nav>
      <hr />
      <Outlet />
    </>
  ) 
}
export default Header;