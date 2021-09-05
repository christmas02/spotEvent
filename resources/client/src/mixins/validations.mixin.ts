import {
    passwordRules,
    emailRules,
    phoneCiRules,
    requiredRules,
    nameRules,
    surnameRules
} from "@/common/rules";

export default {
    data() {
        return {
            passwordRules,
            requiredRules,
            phoneCiRules,
            emailRules,
            nameRules,
            surnameRules
        };
    }
};
