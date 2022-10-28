import React, {useState} from 'react';
import Table from "./ticketList/Table";
import TicketForm from "./TicketForm";
import {Routes, Route, Navigate} from "react-router-dom";
import Login from "./Login";
function Home(){
    return <Navigate to="/login" />;
}

function App() {
    return (
        <div className="container">
            <Routes>
                <Route path="/" element={<Home/>}/>
                <Route path="/table" element={<Table/>}/>
                <Route path="/form" element={<TicketForm/>}/>
                <Route path="/login" element={<Login/>}/>
            </Routes>
        </div>
    );
}

export default App;
