import { useParams } from "react-router-dom"

function About() {
  const params = useParams()
  let projects = [
    {
      name: "Aplikasi A",
      pic: "https://picsum.photos/seed/picsum/200/100",
      desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
    },
    {
      name: "Aplikasi B",
      pic: "https://picsum.photos/seed/picsum/200/100",
      desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
    },
    {
      name: "Aplikasi C",
      pic: "https://picsum.photos/seed/picsum/200/100",
      desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
    },
    {
      name: "Aplikasi D",
      pic: "https://picsum.photos/seed/picsum/200/100",
      desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
    }
  ]
  return (
    <>
      <div className="row">
        <div className="col-md-4">
          <div className="card">
            <img src="https://picsum.photos/200/100" className="card-img-top" alt="..." />
            <div className="card-body">
              <h5 className="card-title text-center
">About Yanwar</h5>
              <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div className="col-md-8">
          <div className="row">
            {projects.map((project) => (
              <div className="col-md-6">
                <div className="card mb-4">
                  <img src={project.pic} className="card-img-top" alt="..." />
                  <div className="card-body">
                    <h5 className="card-title">{project.name}</h5>
                    <p className="card-text">
                      <small>{project.desc}</small>
                    </p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
      
    </>
  )
}

export default About