import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter } from "react-router-dom";
import { Routes } from "./Routes";
import "antd/dist/antd.css";
import "react-gravatar-or-initials/dist/index.css";
import { DeclarationService } from "./services/DeclarationService";
import { DataService } from "./services/DataService";
import { AuthService } from "./services/AuthService";

function App() {
    return (
        <AuthService>
            <BrowserRouter>
                <DataService>
                    <DeclarationService>
                        <Routes />
                    </DeclarationService>
                </DataService>
            </BrowserRouter>
        </AuthService>
    );
}

export default App;

const appContainer = document.getElementById("app");

if (appContainer) {
    ReactDOM.render(<App />, appContainer);
}
