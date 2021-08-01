import api from "../utils/api";

export const registerRequest = (values) => {
    return api.post("/api/users", values);
};

export const verifyUserRequest = (user, hash) => {
    console.log("wi=");
    return api.put(`/api/users/verifyUser?sub=${user}&hash=${hash}`);
};
