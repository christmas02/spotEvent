import { ICommune } from "./../../../interfaces/commune.interface";
import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";

export default {
    store(state: IBenefitState, benefits: Benefit[]): void {
        state.benefits = benefits;
    },
    // storeResult(state: IBenefitState, benefits: Benefit[]): void {
    //     state.benefits = benefits;
    // },
    storeCategories(state: IBenefitState, categories: ICategory[]): void {
        state.categories = categories;
    },
    storecommunes(state: IBenefitState, communes: ICommune[]): void {
        state.communes = communes;
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
    },
    resetSearchForm(state: IBenefitState): void {
        state.choiceCategorie = (null as unknown) as string;
        state.choiceEstimateMin = (null as unknown) as string;
        state.choiceEstimateMax = (null as unknown) as string;
        state.choiceLocalisation = (null as unknown) as string;
    },
    changeStatusFormUpdateProfil(state: IBenefitState, val: boolean): void {
        state.statusFormUpdateProfil = val;
    },
    changeStatusFormUpdatePhoto(state: IBenefitState, val: boolean): void {
        state.statusFormUpdatePhoto = val;
    },
    changeStatusFormUpdatePassword(state: IBenefitState, val: boolean): void {
        state.statusFormUpdatePassword = val;
    },
    resetStatusFormUpdatePhotoAndProfil(state: IBenefitState): void {
        state.statusFormUpdatePhoto = false;
        state.statusFormUpdateProfil = false;
        state.statusFormUpdatePassword = false;
    },
    changeLoading(state: IBenefitState, val: boolean): void {
        state.loading = val;
    },
    changeIsFilter(state: IBenefitState, val: boolean): void {
        state.isFilter = val;
    }
};
