import React from "react";
import Particles from "react-tsparticles";

import particleData from "../../utils/particles.json";

export const Login = () => {
    return (
        <div className="page-container">
            <Particles options={particleData} />
            <div className="login">
                <h1>Login</h1>
            </div>
        </div>
    );
};
