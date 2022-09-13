import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import './index.css';
import Header from './pages/Header';
import Beranda from './pages/Beranda';
import About from './pages/About';
import NotFound from './pages/NotFound';


function App(){
  return(
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<Header />}>
          <Route index element={<Beranda />} />
          <Route path='/About/:nama' element={<About />} />
          <Route path='*' element={<NotFound />} />
        </Route>
      </Routes>
    </BrowserRouter>
  )
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App />);