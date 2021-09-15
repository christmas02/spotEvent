import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import { ISearchForm } from "@/interfaces/app-services.interfaces";
import {
    FilterPayload,
    IBenefitState
} from "@/store/modules/benefits/interfaces/state.interface";
import { ICommune } from "@/interfaces/commune.interface";

export default {
    one(state: IBenefitState) {
        return (id: number) => state.benefits.find(benefit => benefit.id == id);
    },
    all(state: IBenefitState): Benefit[] {
        return state.benefits;
    },
    others(state: IBenefitState): (id: number) => Benefit[] {
        return (id: number) =>
            state.benefits.filter(benefit => benefit.id != id).slice(0, 3);
    },
    categories(state: IBenefitState): ICategory[] {
        return state.categories;
    },
    communes(state: IBenefitState): ICommune[] {
        return state.communes;
    },
    estimates(state: IBenefitState): IEstimate[] {
        return state.estimates;
    },
    providers(state: IBenefitState): IProvider[] {
        // console.log("ici");

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
    statusFormUpdateProfil(state: IBenefitState): Boolean {
        return state.statusFormUpdateProfil;
    },
    statusFormUpdatePhoto(state: IBenefitState): Boolean {
        return state.statusFormUpdatePhoto;
    },
    statusFormUpdatePassword(state: IBenefitState): Boolean {
        return state.statusFormUpdatePassword;
    },
    loading(state: IBenefitState): Boolean {
        return state.loading;
    },
    isFilter(state: IBenefitState): Boolean {
        return state.isFilter;
    }
};
