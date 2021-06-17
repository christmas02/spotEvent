import Vue from "vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import colors from "vuetify/es5/util/colors";

Vue.use(Vuetify);

const opts = {
    theme: {
        dark: false,
        themes: {
            light: {
                primary: "#fbb231",
                secondary: "#2f374a",
                accent: colors.indigo.base // #3F51B5
            },
            dark: {
                primary: "#fbb231",
                secondary: "#2f374a",
                accent: colors.indigo.base // #3F51B5
            }
        }
    }
};

export default new Vuetify(opts);
