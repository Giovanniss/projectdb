import React, { Component } from 'react';

import Toolbar from './components/Toolbar/Toolbar';

class App extends Component {
  render() {
    return (
      <div className="App">
      
        <Toolbar />
        <main style={{marginTop:'64px'}}>
          <p>conteudo do site vem aqui em baixo. pode exportar outros componentes</p>
        </main>
      </div>
    );
  }
}

export default App;
