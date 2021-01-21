import React from 'react';
import './style/css/App.css';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom'
import ListEmployeeComponent from './components/entity/ListComponent';
import CreateListComponent from './components/entity/CreateComponent';
import ViewEmployeeComponent from './components/entity/ViewComponent';
import HeaderComponent from './components/HeaderComponent';
import FooterComponent from './components/FooterComponent';

function App() {
    return (
        <div>
            <Router>
                <HeaderComponent />
                <div className="container">
                    <Switch>
                        <Route path = "/" exact component = {ListEmployeeComponent}></Route>
                        <Route path = "/employees" component = {ListEmployeeComponent}></Route>
                        <Route path = "/add-employee/:id" component = {CreateListComponent}></Route>
                        <Route path = "/view-employee/:id" component = {ViewEmployeeComponent}></Route>
                        {/* <Route path = "/update-employee/:id" component = {UpdateEmployeeComponent}></Route> */}
                    </Switch>
                </div>
                <FooterComponent />
            </Router>
        </div>

    );
}

export default App;