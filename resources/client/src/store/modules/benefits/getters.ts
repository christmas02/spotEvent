import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import { ISearchForm } from "@/interfaces/app-services.interfaces";
import { FilterPayload, IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";

export default {
    one(state: IBenefitState) {
        return (id: number) => state.benefits.find(benefit => benefit.id == id);
    },
    all(state: IBenefitState): Benefit[] {
        return state.benefits;
    },
    others(state: IBenefitState): (id: number) => Benefit[] {
        return (id: number) =>
            state.benefits.filter(benefit => benefit.id != id);
    },
    categories(state: IBenefitState): ICategory[] {
        return state.categories;
    },
    estimates(state: IBenefitState): IEstimate[] {
        return state.estimates;
    },
    providers(state: IBenefitState): IProvider[] {
        console.log("ici");

        return state.providers;
    },
    choiceCategorie(state: IBenefitState): String {
        return state.choiceCategorie;
    },
    choiceEstimateMin(state: IBenefitState): String {
        return state.choiceEstimateMin;
    },
    choiceEstimateMax(state: IBenefitState): String {
        return state.choiceEstimateMax;
    },
    choiceLocalisation(state: IBenefitState): String {
        return state.choiceLocalisation;
    },
    prestationsSearch(state: IBenefitState): ISearchForm {
        return state.prestations;
    },

};
