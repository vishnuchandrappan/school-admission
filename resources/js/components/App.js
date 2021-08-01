import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter } from "react-router-dom";
import { Routes } from "./Routes";
import "antd/dist/antd.css";
import { DeclarationService } from "./services/DeclarationService";
import { DataService } from "./services/DataService";

function App() {
    return (
        <BrowserRouter>
            <DataService>
                <DeclarationService>
                    <div className="container">
                        <Routes />
                    </div>
                </DeclarationService>
            </DataService>
        </BrowserRouter>
    );
}

export default App;

const appContainer = document.getElementById("app");

if (appContainer) {
    ReactDOM.render(<App />, appContainer);
}
