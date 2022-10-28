import React from 'react';
import ReactDOM from 'react-dom';
import App from './components/App';
import { BrowserRouter} from "react-router-dom";

if (document.getElementById('ticketApp')) {
    ReactDOM.render(<BrowserRouter><App /></BrowserRouter>, document.getElementById('ticketApp'));
}
