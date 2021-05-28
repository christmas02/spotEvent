import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";

export default {
    store(state: IBenefitState, benefits: Benefit[]): void {
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
    }
};
