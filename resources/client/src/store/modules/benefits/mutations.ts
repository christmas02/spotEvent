import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";

export default {
    store(state: IBenefitState, benefits: Benefit[]): void {
        state.benefits = benefits;
    },
    storeResult(state: IBenefitState, benefits: Benefit[]): void {
        state.benefits = benefits;
    },
    storeCategories(state: IBenefitState, categories: ICategory[]): void {
        state.categories = categories;
    },
    storeEstimates(state: IBenefitState, val: IEstimate[]): void {
        state.estimates = val;
    },
    storeProviders(state: IBenefitState, val: IProvider[]): void {
        state.providers = val;
    },
    updateChoiceCategorie(state: IBenefitState, val: string): void {
        state.choiceCategorie = val;
    },
    updateChoiceEstimateMax(state: IBenefitState, val: String): void {
        state.choiceEstimateMax = val;
    },
    updateChoiceEstimateMin(state: IBenefitState, val: String): void {
        state.choiceEstimateMin = val;
    },
    updateChoiceLocalisation(state: IBenefitState, val: String): void {
        state.choiceLocalisation = val;
    },
    updatePrestationSearch(state: IBenefitState): void {
        state.prestations.localisation = state.choiceLocalisation;
        state.prestations.estmation_max = state.choiceEstimateMax;
        state.prestations.estmation_min = state.choiceEstimateMin;
        state.prestations.id_prestation = state.choiceCategorie.toString();
    }
};
