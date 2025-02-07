import { createContext, useEffect, useState } from "react";
import axios from "axios";

export const AuthContext = createContext({
  token: null,
  user: null,
  setToken: () => {},
  setUser: () => {},
});

export default function AuthProvider({ children }) {
  const [token, setToken] = useState(localStorage.getItem("token"));
  const [user, setUser] = useState(null);
  const [errors, setErrors] = useState(null);

  const getUser = async () => {
    if (!token) return;
    try {
      const response = await axios.get("/api/user", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      const data = response.data;
      console.log(data);
      if (response.ok) {
        setUser(data);
      } else {
        setToken(null);
        setUser(null);
        localStorage.removeItem("token");
        setErrors(data.errors || { error: data.error });
      }
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    if (token) {
      getUser();
      localStorage.setItem("token", token);
    } else {
      localStorage.removeItem("token");
    }
  }, [token]);

  return (
    <AuthContext.Provider value={{ token, setToken, user, setUser, errors }}>
      {children}
    </AuthContext.Provider>
  );
}
