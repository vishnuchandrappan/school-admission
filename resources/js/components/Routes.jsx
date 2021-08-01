import React from "react";
import { Route, Switch } from "react-router-dom";
import { Login } from "./pages/Login";
import { Home } from "./pages/Home";
import { NotFound } from "./pages/NotFound";
import { ManagementForm } from "./forms/ManagementForm";
import { Register } from "./pages/Register";
import { VerifyUser } from "./pages/VerifyUser";

export const Routes = () => {
    return (
        <Switch>
            <Route path="/" exact component={Home} />
            <Route path="/login" component={Login} />
            <Route path="/register" component={Register} />
            <Route path="/verifyUser" component={VerifyUser} />
            <Route path="/form" component={ManagementForm} />
            <Route component={NotFound} />
        </Switch>
    );
};
