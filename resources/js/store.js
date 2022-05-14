import { isAdminLoggedIn,logAdminOut,isLoggedIn, logOut } from "./shared/utils/auth";


export default {
    state: {


        lastSearch: {
            from: null,
            to: null,

        },

        basket: {
            items: []
        },

        isAdminLoggedIn:false,
        admin:null,
        AdminToken:null,
        
        isLoggedIn: localStorage.getItem("isLoggedIn") || false,
        isAdminLoggedIn:false,
        user: null,
        admin:null,
        notificationlist:[],
        notificationAdminlist:[],
        userToken:localStorage.getItem('userToken') || '',
        EditPost:{}
    },
    mutations: {

        EditPost(state,post){
            state.EditPost = post;
        },

        setUser(state, user) {
            state.user = user;
            Echo.connector.pusher.config.auth.headers.Authorization = `Bearer ${state.userToken}`
            Echo.private('App.User.' + state.user.id)
    .notification((notification) => {
        console.log('notification ',notification);
        state.notificationlist.unshift(notification);

    });
        },
        setAdmin(state, admin) {
            state.admin = admin;
            Echo.connector.pusher.config.auth.headers.Authorization = `Bearer ${state.AdminToken}`
            Echo.private('App.Mdels.admin.' + state.admin.id)
    .notification((notification) => {
        console.log('notifications',notification);
        state.notificationAdminlist.unshift(notification);
        // var audio = new Audio('https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3');
        // audio.play();

    });
        },
       setUserToken(state,userToken){
            state.userToken = userToken;
           
            localStorage.setItem('userToken',JSON.stringify(userToken));
            axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
        },

        setAdminToken(state,AdminToken){
            state.AdminToken = AdminToken;
            localStorage.setItem('userToken',JSON.stringify(AdminToken));
            axios.defaults.headers.common.Authorization = `Bearer ${AdminToken}`
        },

        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
        },


        setAdminLoggedIn(state, payload) {
            state.isAdminLoggedIn = payload;
        },

    },

    getters:{

        Auth(state) {
            return state.isLoggedIn;
        },
        PostToEdit(state){
            return state.EditPost;
        },
        IsUser(state){
            if(state.user){

                return state.user.role_id
                 }
                 return null;
            },
            IsAdmin(state){
                if(state.admin){

                    return state.admin.role_id
                     }
                     return null;
                },
            user(state){

                if(state.user){

                    return state.user;
                     }
                     return null;
                },
                admin(state){

                    if(state.admin){

                        return state.admin;
                         }
                         return null;
                    },
            userid(state){
                if(state.user){

                    return state.user.id
                     }
                     return null;
                },

            AdminId(state){
                if(state.admin){

                    return state.admin.id
                     }
                     return null;
                },


    },
    actions: {
        LoginAdmin({commit},payload){
            axios.post('checkAdminLogin',payload)
            .then(res =>{

                console.log(res.data.token);
                console.log('here is token');
                axios.get('admin').then(res=>{
                    console.log(res.data);
                })
            }).catch(err => {
                    console.log(err);
                    console.log('here no token');
            })
        },
       LoginUser({commit},payload){
            axios.post('login',payload)
            .then(res =>{

                console.log(res.data.token);
                console.log('here is token');
                axios.get('user').then(res=>{
                    console.log(res.data);
                })
            }).catch(err => {
                    console.log(err);
                    console.log('here no token');
            })
        },

        setLastSearch(context, payload) {

            context.commit('setLastSearch', payload);
            localStorage.setItem('lastSearch', JSON.stringify(payload));
        },
        loadStoredAdminState(context) {

            context.commit("setAdminLoggedIn", isAdminLoggedIn());
        },
        loadStoredState(context) {



            context.commit("setLoggedIn", isLoggedIn());
        },

        async loadUser({ commit, dispatch }) {
            if (isLoggedIn()) {
                try {

                    const user = (await axios.get('user')).data;
                    const sacntum = (await axios.get('/token')).data.plainTextToken;
                    console.log(sacntum);
                    //console.log(user);

                    if(user==null){
                        dispatch("logout");
                    }
                    

                    commit('setUserToken',sacntum)
                    commit("setUser", user);
                    commit("setLoggedIn", true);
                // localStorage.setItem('currentuser', JSON.stringify(user));



                } catch (error) {
                    if(401==error.res.status)
                    dispatch("logout");
                }

            }
        },
        logout({ commit }) {

            commit("setUser", {});
            commit('setUserToken','');
            localStorage.removeItem("userToken");

            commit("setLoggedIn", false);
            logOut();

        },
      
        async loadAdmin({ commit, dispatch }) {
            if (isAdminLoggedIn()==true) {
                try {

                    const admin = (await axios.get('/adminUser')).data;
                    const Adminsacntum = (await axios.get('/AdminToken')).data.plainTextToken;
                    console.log(Adminsacntum);
                    //console.log(user);

                    commit('setAdminToken',Adminsacntum)
                    commit("setAdmin", admin);
                    commit("setAdminLoggedIn", true);
                // localStorage.setItem('currentuser', JSON.stringify(user));



                } catch (error) {
                    dispatch("logAdminout");
                    
                }

            }
        },
        logAdminout({ commit }) {

            commit("setAdmin", {});
            commit("setAdminLoggedIn", false);
            logAdminOut();

        },

      
           
          
     

    
    },


}
