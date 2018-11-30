import React, { Component } from 'react';
import { Container, Row, Col } from 'reactstrap';

import Toolbar from './components/Toolbar/Toolbar';

class pagina1 extends Component {
  render() {
    return (
      <div className="pagina1">
      
        <Toolbar />
        <Container style={{marginTop:'64px'}}>
          <Row style={{border:'green'}}>
            <Col>
              <p>cchaudhasiudsa pedro troxa</p>
            
            </Col>
          </Row>
        </Container>

        <main style={{marginTop:'64px'}}>
          <p>conteudo do site vem aqui em baixo. pode exportar outros componentes</p>
  
	  </main>

      </div>
    );
  }
}

export default pagina1;
