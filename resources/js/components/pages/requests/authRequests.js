import api from "../utils/api";

export const registerRequest = (values) => {
    return api.post("/api/users", values);
};
