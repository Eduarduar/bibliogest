const app = {
  routes: {
    home: "/home",
    login: {
      index: "/login",
      auth: "/login/userAuth",
      logout: "/login/logout"
    },
    register: {
      index: "/register",
      register: "/register/register"
    },
    dashboard: {
      index: "/dashboard"
    },
    usuarios: {
      getAllUsers: "/usuarios/getAll",
      addUser: "/usuarios/addUser",
      toggleUser: "/usuarios/toggleUser",
      editUser: "/usuarios/editUser"
    }
  },
  user: {
    sv: false,
    id: "",
    nombre: "",
    correo: "",
    rol_id: "",
  },

  getLocalUser(){
    const user = localStorage.getItem('user');
    if(user){
      this.user = JSON.parse(user);
    }
  },

  setLocalUser({data}){
    localStorage.setItem('user', JSON.stringify(data));
    this.user = {...data};
  },

  removeLocalUser(){
    localStorage.removeItem('user');
    this.user = {
      sv: false,
      id: "",
      nombre: "",
      correo: "",
      rol_id: "",
    };
  }
};
