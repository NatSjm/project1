import axios from 'axios'

export default {
    namespaced: true,
    state: {
        token: null,
        user: null,
    },
    mutations: {
        setToken(state, token) {
            state.token = token;
        },
        setUser(state, user) {
            state.user = user;
        }
    },
    actions: {
        register({dispatch}, credentials) {
            return axios.post('/api/auth/register', credentials).then((response) => {
                dispatch('attempt', response.data.token);
            });
        },

        login({dispatch}, credentials) {
            return axios.post('/api/auth/login', credentials).then((response) => {
                dispatch('attempt', response.data.token);
            });
        },

        updatePersonData({commit, state}, formData) {
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }

            return axios.post('api/profile/' + state.user.id, formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'enctype' : 'multipart/form-data',
                    }
                }
            ).then((responce) => {
                console.log(responce.data);
                commit('setUser',(responce.data));
            });


        },

        async attempt({commit, state}, token) {
            if (token) {
                commit('setToken', token);
            }
            if (!state.token) {
                return;
            }
            try {
                let response = await axios.get('api/auth/me');
                commit('setUser', response.data);
            } catch (e) {
                commit('setToken', null);
                commit('setUser', null);
            }
        },

        logOut({commit}) {
            return axios.post('api/auth/logout').then((response) => {
                console.log(response.data);
                commit('setToken', null);
                commit('setUser', null);
            })
        }
    },
    getters: {
        authenticated(state) {
            return state.token && state.user;
        },
        user(state) {
            return state.user;
        }
    }
}
