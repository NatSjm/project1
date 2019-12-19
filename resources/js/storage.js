var Storage = (function () {
    return {
        add: function (key, value) {
            localStorage.setItem(key, JSON.stringify(value));
        },

        remove: function (key) {
            localStorage.removeItem(key);
        },

        get: function (key) {
            return JSON.parse(localStorage.getItem(key));
        },

        clear: function () {
            localStorage.clear();
        },
        has: function (key) {
            return localStorage.hasOwnProperty(key);
        }

    };
})();

export default Storage;
