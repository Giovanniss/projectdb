import React, { Component } from 'react';
import { Container, Row, Col } from 'reactstrap';

import Toolbar from './components/Toolbar/Toolbar';

class App extends Component {
  render() {
    return (
      <div className="App">
      
        <Toolbar />
        <Container style={{marginTop:'64px'}}>
          <Row style={{border:'green'}}>
            <Col>
              <p>conteudo do site vem aqui em baixo. pode exportar outros componentes</p>
            
            </Col>

          </Row>


        </Container>

        <main style={{marginTop:'64px'}}>
          <p>conteudo do site vem aqui em baixo. pode exportar outros componentes</p>
	  <p>conteudo do site vem aqui em baixo. pode exportar outros componentes</p>        
	  </main>

      </div>
    );
  }
}

export default App;
