import { BenefitService } from "@/services/benefit.service";
import { IBenefitState } from "@/store/modules/benefits/interfaces/state.interface";

export default {
    async fetchAll(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.benefits.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getAll();

            if (result.statu == 1) {
                commit("store", result.listPrestation);
            } else {
                alert("erreur lors de la recuperation des prestations");
            }
        }
    },
    async fetchProviders(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.providers.length === 0) {
            const benefitService = new BenefitService();
            const result = await benefitService.getProviders();

            if (result.statu == 1) {
                commit("storeProviders", result.listPrestataire);
            } else {
                alert("erreur lors de la recuperation des prestataires");
            }
        }
    },
    async fetchCategories(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.categories.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getCategories();

            if (result.statu == 1) {
                commit("storeCategories", result.listCategorie);
            } else {
                alert("erreur lors de la recuperation des categories");
            }
        }
    },
    async fetchEstimates(
        { commit, state }: { commit: any; state: IBenefitState },
        force = false
    ): Promise<void> {
        if (force || state.categories.length === 0) {
            const benefitService = new BenefitService();

            const result = await benefitService.getEstimates();

            if (result.statu == 1) {
                commit("storeEstimates", result.listCategorie);
            } else {
                alert("erreur lors de la recuperation des estimations");
            }
        }
    }
};
