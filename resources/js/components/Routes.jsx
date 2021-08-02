import React from "react";
import { Route, Switch } from "react-router-dom";
import { Login } from "./pages/Login";
import { Home } from "./pages/Home";
import { NotFound } from "./pages/NotFound";
import { ManagementForm } from "./forms/ManagementForm";
import { Register } from "./pages/Register";
import { VerifyUser } from "./pages/VerifyUser";
import { ProtectedRoute } from "./ProtectedRoute";
import { CommunityForm } from "./forms/CommunityForm";

export const Routes = () => {
    return (
        <Switch>
            <ProtectedRoute path="/" exact component={Home} />
            <Route path="/login" component={Login} />
            <Route path="/register" component={Register} />
            <Route path="/verifyUser" component={VerifyUser} />
            <ProtectedRoute
                exact
                path="/forms/management"
                component={ManagementForm}
            />
            <ProtectedRoute
                exact
                path="/forms/community"
                component={CommunityForm}
            />
            <Route component={NotFound} />
        </Switch>
    );
};
