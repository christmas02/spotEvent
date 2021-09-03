import validator from "validator";

export const emailRules = [
    (v: string) => (v && validator.isEmail(v)) || "Email non valide"
];
export const nameRules = [
    (v: string) => (v && !validator.isEmpty(v)) || "Le champ nom est requis",
    (v: string) =>
        // (v &&
        v.split(/[\s-]+/).every(function(str) {
            return validator.isAlpha(str);
        }) || "Le champ nom est invalide"
];

export const requiredRules = [
    (v: string) => (v && !validator.isEmpty(v)) || "Ce champ est requis"
];
export const surnameRules = [
    (v: string) => (v && !validator.isEmpty(v)) || "Le champ prénom est requis",
    (v: string) => {
        return (
            (v &&
                v.split(/[\s-]+/).every(function(str) {
                    return validator.isAlpha(str);
                })) ||
            "Le champ prénom est invalide"
        );
    }
];

export const phoneCiRules = [
    (v: string) => {
        const phone = v ? v.split(" ").join("") : null;
        return (
            (phone && /^(07|05|01|21|25|27)([0-9]{8})$/.test(phone)) ||
            "Numero de téléphone invalide"
        );
    }
];

export const passwordRules = [
    (v: string) => (v && v.length >= 8) || "Minimum 8 caracteres"
];
