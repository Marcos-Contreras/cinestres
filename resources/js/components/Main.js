import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import Navigation from "./Nav"
import LoginForm from "./LoginForm"
import Home from "./Home"

import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';

function Main(){
    return (
        <Router>
            <main>
                <Navigation/>
                    <Switch>
                        <Route path="/cinestres/public/Home" exact component={Home} />
                        <Route path="/cinestres/public/LoginForm" component={LoginForm} />
                    </Switch>
            </main>
        </Router>
    )
}

export default Main;
if(document.getElementById('example')) {
    ReactDOM.render(<Main />, document.getElementById('example'));
}