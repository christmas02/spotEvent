import {
    passwordRules,
    emailRules,
    phoneCiRules,
    requiredRules,
    nameRules
} from "@/common/rules";

export default {
    data() {
        return {
            passwordRules,
            requiredRules,
            phoneCiRules,
            emailRules,
            nameRules
        };
    }
};
