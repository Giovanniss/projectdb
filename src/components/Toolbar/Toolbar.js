import React from 'react';

import './Toolbar.css';

const toolbar = props => ( 
    <header className="toolbar">
        <nav className="toolbar_nav">
            <div></div>
            <div className="toolbar_logo"> 
                <a href="/">Q-Life</a>
            </div>
            <div className="spacer" />
            <div className="toolbar_items">
                <ul>
                    <li><a href="/"> Sistema</a></li>
                    <li><a href="/"> Agendamento</a></li>
                    <li><a href="/"> Cadastro de Clientes</a></li>
                </ul>
            </div>
        </nav>
    </header>
);

export default toolbar;
